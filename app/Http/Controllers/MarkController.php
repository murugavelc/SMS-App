<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Mark;
use DB;
use App\Student;
use App\Department;
use \Input as Input;
use Illuminate\Http\Request;

class MarkController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $department = new Department;
        $dept = $department->select_department();

        return view('student.mark.index',['department' => $dept]);

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function addsem($id)
	{
        $mark = new Mark;
        $sem = $mark->select_sem();
        return view('student.mark.addsem',['semester' => $sem, 'stud_id' => $id]);
	}


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function addmark(Request $requests)
    {
       $stud_id = Input::get('stud_id');
       $sem = Input::get('sem');
       $dept =  DB::table('students')->select('department')->where('id', '=', $stud_id )->first();

       $subjects = DB::table('subjects')
            ->where('sem', '=', $sem)
            ->where('department', '=', $dept->department)
            ->get();
        //return $subjects;
        return view('student.mark.add_marks',['subjects' => $subjects])
            ->with('stud_id', $stud_id)
            ->with('sem', $sem);

    }

    public function Apiaddmark(Request $requests)
    {
        $stud_id = Input::get('stud_id');
        $sem = Input::get('sem');
        $dept =  DB::table('students')->select('department')->where('id', '=', $stud_id )->first();

        $subjects = DB::table('subjects')
            ->where('sem', '=', $sem)
            ->where('department', '=', $dept->department)
            ->get();
        //return $subjects;
        return response()->json(['subjects' => $subjects,
            'status' => 'SUCCESS',
            'message' => 'Add Mark for this subjects'
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function Apistoremark(Request $request)
    {
        $input = $request->input('data');
        $marks = json_decode($input, true);
        $subcount=count($marks['marks']);
        $allsubMrk = $marks['marks'];
        $stud_id = $marks['stud_id'];
        $sem =  $marks['sem'];
        if(!empty($allsubMrk[0])) {
            foreach ($allsubMrk[0] as $subject => $mark) {
                $check = Mark::where('stud_id', '=', $stud_id)->where('sem', '=', $sem)->where('subject', '=', $subject)->count();
                if ($check == 0) {
                    $result = Mark::create([
                        'stud_id' => $stud_id,
                        'sem' => $sem,
                        'subject' => $subject,
                        'grade' => $mark,
                    ]);
                }
            }
            if (empty($result)) {
                return response()->json(['data' => Null,
                    'status' => 'ERROR',
                    'message' => 'This Semester Mark already submitted'
                ]);
            } else {
                return response()->json(['data' => $subcount,
                    'status' => 'SUCCESS',
                    'message' => 'This Semester Mark submitted successfully'
                ]);
            }
        }else {
            return response()->json(['data' => Null,
                'status' => 'ERROR',
                'message' => 'Please enter marks before submit'
            ]);
        }
    }


    /**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function storemark(Request $request)
	{
        $marks = $request->input('marks');
       // $marks = json_decode($input, true);
        $stud_id = Input::get('stud_id');
        $sem = Input::get('sem');
        foreach ($marks as $subject => $mark) {
            $check = Mark::where('stud_id', '=', $stud_id)->where('sem', '=', $sem)->where('subject', '=', $subject)->count();
            if ($check == 0) {
                $result = Mark::create([
                    'stud_id' => $stud_id,
                    'sem' => $sem,
                    'subject' => $subject,
                    'grade' => $mark,
                ]);
            }
        }
        return redirect('/student/mark/show')
            ->with('success', 'Marks Added successfully');

	}

    public function viewmark($id)
    {
        $marks = DB::table('marks')
            ->where('stud_id', '=', $id)
            ->get();

     //return $marks;
        return view('student.mark.view_marks',['marks' => $marks]);
    }

    public function Apiviewmark(Request $requests)
    {
        $stud_id = Input::get('stud_id');
        $sem = Input::get('sem');
        if(empty($sem)){
            $marks = DB::table('marks')
                ->where('stud_id', '=', $stud_id)
                ->get();
        }else {
            $marks = DB::table('marks')
                ->where('sem', '=', $sem)
                ->where('stud_id', '=', $stud_id)
                ->get();
        }
       // return $marks;
        if(empty($marks)) {
            return response()->json(['marks' => $marks,
                'status' => 'ERROR',
                'message' => 'Marks Not added for the selected Sem'
            ]);
        }
        return response()->json(['marks' => $marks,
            'status' => 'SUCCESS',
            'message' => 'Marks of the selected Sem'
        ]);

    }
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
        $students = new Student ;
        if(Input::has('rollno')) {
            $students = $students->where('rollno', '=', Input::get('rollno'));
        }
        if(Input::has('degree')){
            $students = $students->where('degree', '=', Input::get('degree'));
        }
        if(Input::has('department')){
            $string = preg_replace('/\s+/', ' ',  Input::get('department'));
            $students = $students->where('department', '=',$string);
        }
        if(Input::has('year')){
            $students = $students->where('year', '=',  Input::get('year'));
        }
        if(Input::has('section')){
            $students = $students->where('section', '=', Input::get('section'));
        }
        if(Input::has('name')) {
            $students = $students->where('name', '=', Input::get('name'));
        }
        if(Input::has('gender')){
            $students = $students->where('gender', '=',  Input::get('gender') );
        }
        $studentsList = $students->paginate(10);

        return view('student.mark.students_list')
            ->with('students', $studentsList);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function editmark($id)
	{
        $mark = new Mark;
        $sem = $mark->select_sem();
        return view('student.mark.edit_marks',['semester' => $sem, 'stud_id' => $id]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function updatemark(Request $requests)
    {
       $stud_id = Input::get('stud_id');
       $sem = Input::get('sem');

       $marks = DB::table('marks')
            ->where('sem', '=', $sem)
            ->where('stud_id', '=', $stud_id)
            ->get();
       // return $marks;
        return view('student.mark.update_marks',['marks' => $marks])
            ->with('stud_id', $stud_id)
            ->with('sem', $sem);

    }

    public function Apiupdatemark(Request $requests)
    {
        $stud_id = Input::get('stud_id');
        $sem = Input::get('sem');

        $marks = DB::table('marks')
            ->where('sem', '=', $sem)
            ->where('stud_id', '=', $stud_id)
            ->get();
        // return $marks;
        if ($marks) {
            return response()->json(['data' => $marks,
                'status' => 'SUCCESS',
                'message' => 'Selected Semester Subject and Mark to Update'
            ]);
        }else{
            return response()->json(['data' => Null,
                'status' => 'ERROR',
                'message' => 'No result found for your Selection'
            ]);
        }

    }

    public function storeUpdatemark(Request $request)
    {
        $marks = $request->input('marks');
        // $marks = json_decode($input, true);
        $stud_id = Input::get('stud_id');
        $sem = Input::get('sem');
        foreach ($marks as $subject => $mark) {
            $check = Mark::where('stud_id', '=', $stud_id)->where('sem', '=', $sem)->where('subject', '=', $subject)->count();
            if ($check != 0) {
                $result =  DB::table('marks')
                    ->where('stud_id', $stud_id)
                    ->where('sem', $sem)
                    ->where('subject', $subject)
                    ->update([
                        'grade' => $mark,
                    ]);
            }
        }
        return redirect('/student/mark/show')
            ->with('success', 'Marks Updated successfully');
    }

    public function ApistoreUpdatemark(Request $request)
    {
        $input = $request->input('data');
        $marks = json_decode($input, true);
        $subcount=count($marks['marks']);
        $allsubMrk = $marks['marks'];
        $stud_id = $marks['stud_id'];
        $sem =  $marks['sem'];
        if(!empty($allsubMrk[0])) {
            foreach ($allsubMrk[0] as $subject => $mark) {
                $check = Mark::where('stud_id', '=', $stud_id)->where('sem', '=', $sem)->where('subject', '=', $subject)->count();
                if ($check != 0) {
                    $result =  DB::table('marks')
                        ->where('stud_id', $stud_id)
                        ->where('sem', $sem)
                        ->where('subject', $subject)
                        ->update([
                            'grade' => $mark,
                        ]);
                }
            }
            if ($result) {
                return response()->json(['data' => $subcount,
                    'status' => 'SUCCESS',
                    'message' => 'This Semester Mark Updated successfully'
                ]);
            }
        }else {
            return response()->json(['data' => Null,
                'status' => 'ERROR',
                'message' => 'Please enter marks before submit'
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
		//
	}

}
