<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Chat;
use App\User;
use Illuminate\Http\Request;
use Auth;
use DB;
use Input;

class ChatController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $users = DB::table('users')
            ->join('staff_details', 'users.id', '=', 'staff_details.user_id')
            ->whereNull('users.deleted_at')
            ->get();
        return view('chat.index')
            ->with('users', $users);
	}
    public function Userindex()
    {
        $users = DB::table('users')
            ->whereNull('users.deleted_at')
            ->get();
        if(!empty($users)){
            return response()->json(['data' => $users,
                'status' => 'SUCCESS',
                'message' => 'Available User list'
            ]);
        }else{
            return response()->json(['data' => Null,
                'status' => 'SUCCESS',
                'message' => 'No User available'
            ]);
        }
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */

    public function store()
    {
        $sender_id = Input::get('sender_id');
        $receiver_id = Input::get('receiver_id');
        $msg = Input::get('msg');
        $chat = '';
        if(!empty($msg)){
            $chat = Chat::create([
                'sender_id' => $sender_id,
                'receiver_id' => $receiver_id,
                'msg' =>$msg,
            ]);
            return view('chat.index')
                ->with('chats', $chat);
        }else{
            return view('chat.index')
                ->with('chats', $chat);
        }
    }

    public function Apistore(Request $request)
    {
        $sender_id = Input::get('sender_id');
        $receiver_id = Input::get('receiver_id');
       $mssg = Input::get('msg');
        if(!empty($mssg)){
            $chat = Chat::create([
                'sender_id' => $sender_id,
                'receiver_id' => $receiver_id,
                'msg' =>$mssg,

            ]);
            $user = User::where('id', '=', $receiver_id)->first();
            $device_id = $user->device_id;
            $msg = $mssg;
            // Send message notification to that
            $chat_notifi = gcm_notification($device_id,$msg);

            return response()->json(['data' => $chat,
                'status' => $chat_notifi,
                'message' => 'Chat created successfully'
            ]);
        }else{
            return response()->json(['data' => Null,
                'status' => 'ERROR',
                'message' => 'Empty Msg received'
            ]);
        }
    }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
        $sender_id = Input::get('sender_id');
        $receiver_id = Input::get('receiver_id');
        $chats = DB::table('chats')
            ->whereRaw("(sender_id = $sender_id AND receiver_id = $receiver_id) OR (sender_id =$receiver_id AND receiver_id = $sender_id)")
            ->whereNull('deleted_at')
            ->orderBy('created_at', 'asc')
            ->get();
        return view('chat.index')
            ->with('chats', $chats);
	}

    public function Apishow()
    {
        $sender_id = Input::get('sender_id');
        $receiver_id = Input::get('receiver_id');
        $chats = DB::table('chats')
            ->whereRaw("(sender_id = $sender_id AND receiver_id = $receiver_id) OR (sender_id =$receiver_id AND receiver_id = $sender_id)")
            ->whereNull('deleted_at')
            ->orderBy('created_at', 'asc')
            ->get();

        if(!empty($chats)){
            return response()->json(['data' => $chats,
                'status' => 'SUCCESS',
                'message' => 'Available Chat history'
            ]);
        }else{
            return response()->json(['data' => Null,
                'status' => 'ERROR',
                'message' => 'No Chat history '
            ]);
        }
    }

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
        $sender_id = Input::get('sender_id');
        $receiver_id = Input::get('receiver_id');
        DB::table('chats')
            ->whereRaw("(sender_id = $sender_id AND receiver_id = $receiver_id) OR (sender_id =$receiver_id AND receiver_id = $sender_id)")
            ->update([
                'deleted_at' => 1,
            ]);
        return redirect('/chat')
            ->with('success', 'Chat Soft Deleted successfully');
	}

    public function Apidestroy()
    {
        $sender_id = Input::get('sender_id');
        $receiver_id = Input::get('receiver_id');

        DB::table('chats')
            ->whereRaw("(sender_id = $sender_id AND receiver_id = $receiver_id) OR (sender_id =$receiver_id AND receiver_id = $sender_id)")
            ->update([
                'deleted_at' => 1,
            ]);
        return response()->json(['data' => true,
            'status' => 'SUCCESS',
            'message' => 'Chat History Soft Deleted successfully'
        ]);
    }

}
