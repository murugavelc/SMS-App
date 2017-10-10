<?php namespace App\Http\Controllers;

use App\Hod;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Department;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;
use Redirect;
use Mail;
use DB;
use \Input as Input;

class HodController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $hods = DB::table('hods')
            ->whereNull('deleted_at')
            ->paginate(5);
        return view('hod.index')
            ->with('staffs', $hods);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $department = new Department;
        $data = $department->select_department();
        return view('hod.create',['department' => $data]);
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
            'emp_id' => 'required|unique:hods',
            'email' => 'required|unique:hods|email',
            'phone' => 'required|max:10',
            'degree' => 'required',
            'department' => 'required',
            'doj' => 'required|date|after:01/01/1990',
            //'photo' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('hod/create')
                ->withErrors($validator)
                ->withInput();
        } else {

            if (Input::file('photo')) {
                $input = Input::all();
                $file = array_get($input,'photo');                    //get image name
                $img_extension = $file->getClientOriginalName();   //get image extension
                $filename = $request['emp_id'] . '-' . $request['name'].''.$img_extension;
                $destinationPath = public_path().'/images/profile/hods';   //image upload path
                $file->move($destinationPath, str_replace (" ", "", $filename));
            }


            $hod = Hod::create([
                'name' => Input::get('name'),
                'emp_id' => Input::get('emp_id'),
                'gender' => Input::get('gender'),
                'email' => Input::get('email'),
                'phone' => Input::get('phone'),
                'degree' => Input::get('degree'),
                'department' => Input::get('department'),
                'date_of_join' => Input::get('doj'),
                'photo' => str_replace (" ", "", $filename),
            ]);

            return redirect('/hod')
                ->with('success', 'HOD created successfully');
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
        $hods = DB::table('hods')
            ->where('id', '=', $id)
            ->first();
        return view('hod.view')
            ->with('staffs', $hods);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $hods = DB::table('hods')
            ->where('id', '=', $id)
            ->first();
        $department = new Department;
        $data = $department->select_department();
        return view('hod.update',['department' => $data])
            ->with('staffs', $hods);
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
            return redirect('hod/edit/'.$id)
                ->withErrors($validator)
                ->withInput();
        } else {
            if (Input::file('photo')) {

                $input = Input::all();
                $file = array_get($input, 'photo');                    //get image name
                $img_extension = $file->getClientOriginalName();   //get image extension
                $filename = $request['emp_id'] . '-' . $request['name'] . '' . $img_extension;
                $destinationPath = public_path() . '/images/profile/hods';   //image upload path
                $file->move($destinationPath, str_replace(" ", "", $filename));

                DB::table('hods')
                    ->where('id', $id)
                    ->update([
                        'name' => Input::get('name'),
                        'gender' => Input::get('gender'),
                        'phone' => Input::get('phone'),
                        'degree' => Input::get('degree'),
                        'department' => Input::get('department'),
                        'date_of_join' => Input::get('doj'),
                        'photo' => str_replace(" ", "", $filename),

                    ]);
            }
            DB::table('hods')
                ->where('id', $id)
                ->update([
                    'name' => Input::get('name'),
                    'gender' => Input::get('gender'),
                    'phone' => Input::get('phone'),
                    'degree' => Input::get('degree'),
                    'department' => Input::get('department'),
                    'date_of_join' => Input::get('doj'),

                ]);

            return redirect('/hod')
                ->with('success', 'HOD Upadated successfully');
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
        DB::table('hods')
            ->where('id', $id)
            ->update([
                'deleted_at' => 1,
            ]);
        return redirect('/hod')
            ->with('success', 'HOD Soft Deleted successfully');
    }

}
