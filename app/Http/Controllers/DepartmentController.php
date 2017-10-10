<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Department;
use Validator;
use \Input as Input;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent;

class DepartmentController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

        $departments = DB::table('departments')
            ->whereNull('deleted_at')
            ->paginate(10);
        return view('department.index')
            ->with('departments', $departments);
	}

    public function ApiDepartment()
    {
        $departments = Department::get();
        return response()->json(['departments' => $departments,
            'status' => 'SUCCESS',
            'message' => 'Showing all Departments'
            ]);

    }
    public function ApiSemester()
    {
        $semesters = DB::table('semesters')->get();
        return response()->json(['semesters' => $semesters,
            'status' => 'SUCCESS',
            'message' => 'Showing all Semesters'
        ]);

    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view('department.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
        $validator = Validator::make($request->all(), [
            'dept_name' => 'required',
            'degree' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('course/department/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $dept = Department::create([
                'name' =>  Input::get('dept_name'),
                'type' =>  Input::get('degree'),
                ]);

            return redirect('/course/department')
                ->with('success', 'Department created successfully');

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
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $department = DB::table('departments')->where('id', '=', $id)->lockForUpdate()->first();

        return view('department.update')
            ->with('department', $department);
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
            'dept_name' => 'required',
            'degree' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('course/department/edit/'. $id)
                ->withErrors($validator)
                ->withInput();
        } else {
            DB::table('departments')
                ->where('id', $id)
                ->update([
                    'name' =>  Input::get('dept_name'),
                    'type' =>  Input::get('degree'),
                ]);

            return redirect('course/department')
                ->with('success', 'Department updated successfully');
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
        DB::table('departments')
            ->where('id', $id)
            ->update([
                'deleted_at' => 1,
            ]);

        return redirect('/course/department')
            ->with('success', 'Department Soft Deleted successfully');
	}

}
