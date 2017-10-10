<?php namespace App\Http\Controllers;

use App\Event;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use DB;
use Validator;
use Redirect;
use \Input as Input;

class EventController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $events = DB::table('events')
            ->whereNull('deleted_at')
            ->paginate(5);
        return view('event.index')
            ->with('events', $events);
	}

    public function Apiindex()
    {
        $events = DB::table('events')
            ->whereNull('deleted_at')
            ->get();

        if(!empty($events)) {
            return response()->json(['data' => $events,
                'status' => 'SUCCESS',
                'message' => 'The availabe result'
            ]);
        }else{
            return response()->json(['data' => $events,
                'status' => 'SUCCESS',
                'message' => 'No result availabe '
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
        return view('event.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'organizer' => 'required',
            'starts' => 'required',
            'ends' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('event/create')
                ->withErrors($validator)
                ->withInput();

        } else {

            $event = Event::create([
                'title' => Input::get('title'),
                'description' => Input::get('description'),
                'guest' => Input::get('guest'),
                'organizer' => Input::get('organizer'),
                'starts_on' => Input::get('starts'),
                'ends_up' => Input::get('ends'),
                'venue' => Input::get('venue'),
            ]);
        }
        return redirect('/event')
            ->with('success', 'Event created successfully');
	}

    public function Apistore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'organizer' => 'required',
            'starts_on' => 'required',
            'ends_up' => 'required',
        ]);
        if ($validator->fails()) {
            $data = array(
                'status' => 'ERROR',
                'message' => 'Validation error occurs',

            );
            return response($data, 500);

        } else {

            $event = Event::create([
                'title' => Input::get('title'),
                'description' => Input::get('description'),
                'guest' => Input::get('guest'),
                'organizer' => Input::get('organizer'),
                'starts_on' => Input::get('starts_on'),
                'ends_up' => Input::get('ends_up'),
                'venue' => Input::get('venue'),
            ]);
        }
        return response()->json(['data' => $event,
            'status' => 'SUCCESS',
            'message' => 'Event created successfully'
        ]);
    }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $event = DB::table('events')
            ->where('id', '=', $id)
            ->first();
        return view('event.view')
            ->with('event', $event);
	}

    public function Apishow($id)
    {
        $event = DB::table('events')
            ->where('id', '=', $id)
            ->first();
        if(!empty($event)) {
            return response()->json(['data' => $event,
                'status' => 'SUCCESS',
                'message' => 'The availabe result'
            ]);
        }else{
            return response()->json(['data' => $event,
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
        $event = DB::table('events')
            ->where('id', '=', $id)
            ->first();
        return view('event.update')
            ->with('event', $event);
	}

    public function Apiedit($id)
    {
        $event = DB::table('events')
            ->where('id', '=', $id)
            ->first();
        if(!empty($event)) {
            return response()->json(['data' => $event,
                'status' => 'SUCCESS',
                'message' => 'The availabe result'
            ]);
        }else {
            return response()->json(['data' => $event,
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
        $id = Input::get('id');

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'organizer' => 'required',
            'starts' => 'required',
            'ends' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('event/update')
                ->withErrors($validator)
                ->withInput();

        } else {

            DB::table('events')
                ->where('id', $id)
                ->update([
                'title' => Input::get('title'),
                'description' => Input::get('description'),
                'guest' => Input::get('guest'),
                'organizer' => Input::get('organizer'),
                'starts_on' => Input::get('starts'),
                'ends_up' => Input::get('ends'),
                'venue' => Input::get('venue'),
            ]);
        }
        return redirect('/event')
            ->with('success', 'Event Updated successfully');
	}

    public function Apiupdate(Request $request)
    {
        $id = Input::get('id');

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'organizer' => 'required',
            'starts' => 'required',
            'ends' => 'required',
        ]);
        if ($validator->fails()) {
            $data = array(
                'status' => 'ERROR',
                'message' => 'Validation error occers',
            );
            return response($data, 500);

        } else {

            DB::table('events')
                ->where('id', $id)
                ->update([
                    'title' => Input::get('title'),
                    'description' => Input::get('description'),
                    'guest' => Input::get('guest'),
                    'organizer' => Input::get('organizer'),
                    'starts_on' => Input::get('starts'),
                    'ends_up' => Input::get('ends'),
                    'venue' => Input::get('venue'),
                ]);
        }
        return response()->json(['data' => true,
            'status' => 'SUCCESS',
            'message' => 'Event updated successfully'
        ]);
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        DB::table('events')
            ->where('id', $id)
            ->update([
                'deleted_at' => 1,
            ]);

        return redirect('/event')
            ->with('success', 'Event Soft Deleted successfully');
	}

    public function Apidestroy($id)
    {
        DB::table('events')
            ->where('id', $id)
            ->update([
                'deleted_at' => 1,
            ]);

        return response()->json(['data' => true,
            'status' => 'SUCCESS',
            'message' => 'Event Soft Deleted successfully'
        ]);

    }

}
