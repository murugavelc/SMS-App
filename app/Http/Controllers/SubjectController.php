<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Student;
use App\Subject;
use DB;
use App\Department;
use Validator;
use \Input as Input;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent;

class SubjectController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $subjects = DB::table('subjects')
            ->whereNull('deleted_at')
            ->paginate(10);
        return view('subject.index')
            ->with('subjects', $subjects);
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
        return view('subject.create',['department' => $data]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'department' => 'required',
            'year' => 'required',
            'sem' => 'required',
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('course/subject/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $subjt = Subject::create([
                'department' => Input::get('department'),
                'year' => Input::get('year'),
                'sem' => Input::get('sem'),
                'name' =>  Input::get('name'),
            ]);

            return redirect('/course/subject')
                ->with('success', 'Subject created successfully');

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
        $subject = DB::table('subjects')->where('id', '=', $id)->lockForUpdate()->first();
        $department = new Department;
        $data = $department->select_department();
        return view('subject.update',['department' => $data])
            ->with('subject', $subject);
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
            'department' => 'required',
            'year' => 'required',
            'sem' => 'required',
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('course/subject/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            DB::table('subjects')
                ->where('id', $id)
                ->update([
                    'department' => Input::get('department'),
                    'year' => Input::get('year'),
                    'sem' => Input::get('sem'),
                    'name' =>  Input::get('name'),
                ]);

            return redirect('course/subject')
                ->with('success', 'Subject updated successfully');
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
        DB::table('subjects')
            ->where('id', $id)
            ->update([
                'deleted_at' => 1,
            ]);

        return redirect('/course/subject')
            ->with('success', 'Subject Soft Deleted successfully');
    }


}
