<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Staff;
use Illuminate\Http\Response;
use Validator;
use Redirect;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use DB;
use \Input as Input;
use Chrisbjr\ApiGuard\Http\Controllers\ApiGuardController;
use Chrisbjr\ApiGuard\Models\ApiKey;


class StaffController extends Controller {

   // protected $response;
    protected $apiMethods = [
        'authenticate' => [
            'ApiAllStaff' => false
        ],

    ];

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

        $staffs = DB::table('users')
            ->join('staff_details', 'users.id', '=', 'staff_details.user_id')
            ->whereNull('users.deleted_at')
            ->paginate(5);
        return view('staff.index')
            ->with('staffs', $staffs);

	}
    public function AllStaff(Request $request)
    {
        $staffs = DB::table('users')
            ->join('staff_details', 'users.id', '=', 'staff_details.user_id')
            ->whereNull('users.deleted_at')
            ->paginate(5);
        if($staffs) {
            return response()->json(['data' => $staffs,
                'status' => 'SUCCESS',
                'message' => 'The availabe result'
            ]);
        }else{
            return response()->json(['data' => $staffs,
                'status' => 'SUCCESS',
                'message' => 'No result availabe '
            ]);
        };
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view('staff.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'emp_id' => 'required|unique:staff_details',
            'email' => 'required|unique:users|email',
            'phone' => 'required|max:10',
            'degree' => 'required',
            'department' => 'required',
            'doj' => 'required|date|after:01/01/1990',
            //'photo' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('staff/create')
                ->withErrors($validator)
                ->withInput();
        } else {

            if (Input::file('photo')) {
                $input = Input::all();
                $file = array_get($input,'photo');                    //get image name
                $img_extension = $file->getClientOriginalName();   //get image extension
                $filename = $request['emp_id'] . '-' . $request['name'].''.$img_extension;
                $destinationPath = public_path().'/images/profile/staffs';   //image upload path
                $file->move($destinationPath, str_replace (" ", "", $filename));
            }

            $string_pwd = str_random(16);
            $random_password = Hash::make($string_pwd);

            $staff = User::create([
                'name' => Input::get('name'),
                'email' => Input::get('email'),
                'phone' => Input::get('phone'),
                'usertype' => 2,
                'password' => $random_password,
                'profile' => str_replace (" ", "", $filename),
            ]);

            $staff = Staff::create([
                'user_id' => $staff->id,
                'emp_id' => Input::get('emp_id'),
                'degree' => Input::get('degree'),
                'department' => Input::get('department'),
                'date_of_join' => Input::get('doj'),

            ]);

            if(Input::get('email')){
                $data = array(
                    'name' => Input::get('name'),
                    'email' => Input::get('email'),
                    'password' => $string_pwd,
                );
                Mail::send('emails.staff_log_info', $data, function ($message) {

                    $message->from('murugavel.kcmr@gmail.com', 'SMS | Admin');
                    $message->to(Input::get('email'))->subject('Your login details..!!');
                });
            }

            return redirect('/staff')
                ->with('success', 'Staff created successfully');
        }

    }

    public function Apistore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'emp_id' => 'required|unique:staff_details',
            'email' => 'required|unique:users|email',
            'phone' => 'required|max:10',
            'degree' => 'required',
            'department' => 'required',
            'doj' => 'required|date|after:01/01/1990',
            //'photo' => 'required',
        ]);
        if ($validator->fails()) {
            $data = array(
                'status' => 'ERROR',
                'message' => 'Validation error occurs',
                // 'data'      => json_encode($staff),
            );
            return response($data, 500);

        } else {
            if (Input::file('photo')) {
                $input = Input::all();
                $file = array_get($input,'photo');                    //get image name
                $img_extension = $file->getClientOriginalName();   //get image extension
                $filename = $request['emp_id'] . '-' . $request['name'].''.$img_extension;
                $destinationPath = public_path().'/images/profile/staffs';   //image upload path
                $file->move($destinationPath, str_replace (" ", "", $filename));
            }
            $string_pwd = str_random(16);
            $random_password = Hash::make($string_pwd);

            $staff = User::create([
                'name' => Input::get('name'),
                'email' => Input::get('email'),
                'phone' => Input::get('phone'),
                'usertype' => 2,
                'password' => $random_password,
                'profile' => str_replace (" ", "", $filename),
            ]);

            $staff = Staff::create([
                'user_id' => $staff->id,
                'emp_id' => Input::get('emp_id'),
                'degree' => Input::get('degree'),
                'department' => Input::get('department'),
                'date_of_join' => Input::get('doj'),

            ]);

            if (Input::get('email')) {
                $data = array(
                    'name' => Input::get('name'),
                    'email' => Input::get('email'),
                    'password' => $string_pwd,
                );
                Mail::send('emails.staff_log_info', $data, function ($message) {

                    $message->from('murugavel.kcmr@gmail.com', 'SMS | Admin');
                    $message->to(Input::get('email'))->subject('Your login details..!!');
                });
            }
            return response()->json(['data' => $staff,
                'status' => 'SUCCESS',
                'message' => 'Staff created successfully'
            ]);
        }
    }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
    public function show($id)
    {
        $staffs = DB::table('users')
            ->join('staff_details', 'staff_details.user_id', '=', 'users.id')
            ->where('users.id', '=', $id)
            ->first();
        return view('staff.view')
            ->with('staffs', $staffs);
    }

    public function Apishow($id)
	{
        $staffs = DB::table('users')
            ->join('staff_details', 'staff_details.user_id', '=', 'users.id')
            ->where('users.id', '=', $id)
            ->first();
        if($staffs) {
            return response()->json(['data' => $staffs,
                'status' => 'SUCCESS',
                'message' => 'The availabe result'
            ]);
        }else{
            return response()->json(['data' => $staffs,
                'status' => 'SUCCESS',
                'message' => 'No result availabe '
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
        $user_id = $id;
        $staffs = DB::table('users')
            ->join('staff_details', 'staff_details.user_id', '=', 'users.id')
            ->where('users.id', '=', $id)
            ->first();

        return view('staff.update')
            ->with('staffs', $staffs);
	}

    public function Apiedit($id)
    {
        $user_id = $id;
        $staffs = DB::table('users')
            ->join('staff_details', 'staff_details.user_id', '=', 'users.id')
            ->where('users.id', '=', $id)
            ->first();

        if($staffs) {
            return response()->json(['data' => $staffs,
                'status' => 'SUCCESS',
                'message' => 'The availabe result'
            ]);
        }else {
            return response()->json(['data' => $staffs,
                'status' => 'SUCCESS',
                'message' => 'No result availabe '
            ]);
        }
    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request)
	{
        $id = Input::get('user_id');

        $validator = Validator::make($request->all(), [
            'name' => 'required',
           // 'emp_id' => 'required|unique:staff_details',
           // 'email' => 'required|email',
            'phone' => 'required|max:10',
            'degree' => 'required',
            'department' => 'required',
            'doj' => 'required|date|after:01/01/1990',
            //   'photo' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('staff/edit/'.$id)
                ->withErrors($validator)
                ->withInput();
        } else {
            if (Input::file('photo')) {

                $input = Input::all();
                $file = array_get($input,'photo');                    //get image name
                $img_extension = $file->getClientOriginalName();   //get image extension
                $filename = $request['emp_id'] . '-' . $request['name'].''.$img_extension;
                $destinationPath = public_path().'/images/profile/staffs';   //image upload path
                $file->move($destinationPath, str_replace (" ", "", $filename));

                 DB::table('users')
                    ->where('id', $id)
                    ->update([
                        'name' => Input::get('name'),
                       // 'email' => Input::get('email'),
                        'phone' => Input::get('phone'),
                        'profile' => str_replace (" ", "", $filename),
                    ]);
            }
            DB::table('users')
                ->where('id', $id)
                ->update([
                    'name' => Input::get('name'),
                   // 'email' => Input::get('email'),
                    'phone' => Input::get('phone'),

                ]);
            DB::table('staff_details')
                ->where('user_id', $id)
                ->update([
                    'degree' => Input::get('degree'),
                    'department' => Input::get('department'),
                    'date_of_join' => Input::get('doj'),
                ]);

            return redirect('/staff')
                ->with('success', 'Staff Upadated successfully');
        }
	}

    public function Apiupdate(Request $request, $id)
    {
        $id = Input::get('user_id');
        $validator = Validator::make($request->all(), [
            'name' => 'required',
           // 'emp_id' => 'required|unique:staff_details',
           // 'email' => 'required|email',
            'phone' => 'required|max:10',
            'degree' => 'required',
            'department' => 'required',
            'doj' => 'required|date|after:01/01/1990',
            //   'photo' => 'required',
        ]);
        if ($validator->fails()) {
            $data = array(
                'status' => 'ERROR',
                'message' => 'Validation error occers',
                //'data'      => json_encode($staff),
            );
            return response($data, 500);
        } else {

            if (Input::file('photo')) {
                $input = Input::all();
                $file = array_get($input,'photo');                    //get image name
                $img_extension = $file->getClientOriginalName();   //get image extension
                $filename = $request['emp_id'] . '-' . $request['name'].''.$img_extension;
                $destinationPath = public_path().'/images/profile/staffs';   //image upload path
                $file->move($destinationPath, str_replace (" ", "", $filename));
            }

            DB::table('users')
                ->where('id', $id)
                ->update([
                    'name' => Input::get('name'),
                    'email' => Input::get('email'),
                    'phone' => Input::get('phone'),
                    'profile' => str_replace (" ", "", $filename),
                ]);
            DB::table('staff_details')
                ->where('user_id', $id)
                ->update([
                   // 'emp_id' => Input::get('emp_id'),
                    'degree' => Input::get('degree'),
                    'department' => Input::get('department'),
                    'date_of_join' => Input::get('doj'),
                ]);

            return response()->json(['data' => true,
                'status' => 'SUCCESS',
                'message' => 'Staff updated successfully'
            ]);
        }
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{

        DB::table('staff_details')
            ->where('user_id', $id)
            ->update([
                'deleted_at' => 1,
            ]);
        DB::table('users')
        ->where('id', $id)
        ->update([
            'deleted_at' => 1,
        ]);

        return redirect('/staff')
            ->with('success', 'Staff Soft Deleted successfully');
	}

    public function Apidestroy($id)
    {
        DB::table('staff_details')
            ->where('user_id', $id)
            ->update([
                'deleted_at' => 1,
            ]);
        DB::table('users')
            ->where('id', $id)
            ->update([
                'deleted_at' => 1,
            ]);
        return response()->json(['data' => true,
            'status' => 'SUCCESS',
            'message' => 'Staff Soft Deleted successfully'
        ]);
    }
    public function sendEmail(Request $request)
    {
        $data = array(
            'name' => "Murugavel",
            'email' => "muruga@mail.com",
            'password' => "SjsdsnjD",
        );

        Mail::send('emails.staff_log_info', $data, function ($message) {

            $message->from('murugavel.kcmr@gmail.com', 'SMS | Admin');

            $message->to('murugavel.c@vividinfotech.com')->subject('Your login details..!!');

        });

        return "Your email has been sent successfully";
    }
    public function getStaffPhoto($filename){
	    $file = Storage::disk('local')->get($filename);
	    return new Response($file, 200);
    }
}
