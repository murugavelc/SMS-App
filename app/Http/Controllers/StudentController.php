<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Student;
use App\Department;
use DB;
use Illuminate\Http\Response;
use Validator;
use Redirect;
use Illuminate\Http\Request;
use \Input as Input;
use Illuminate\Database\Eloquent;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function index()
	{
        $students = DB::table('students')
            ->whereNull('deleted_at')
            ->paginate(10);
        return view('student.index')
            ->with('students', $students);
	}
    public function Allstudent()
    {
        $students = DB::table('students')
            ->whereNull('deleted_at')
            ->paginate(10);

        if(!$students) {
            return response()->json(['data' => $students,
                'status' => 'SUCCESS',
                'message' => 'The availabe result'
            ]);
        }else{
        return response()->json(['data' => $students,
            'status' => 'SUCCESS',
            'message' => 'No result availabe '
        ]);
    }
    }


    public function searchIndex()
    {
        $keywrd = Input::get('key');
        if(!empty($keywrd)) {
            $students = DB::table('students')
                ->whereNull('deleted_at')
                ->orWhere('name', '=', $keywrd)
                ->orWhere('rollno', '=', $keywrd)
                ->orWhere('gender', '=', $keywrd)
                ->orWhere('degree', '=', $keywrd)
                ->orWhere('department', '=', $keywrd)
                ->orWhere('year', '=', $keywrd)
                ->orWhere('phone', '=', $keywrd)
                ->orWhere('section', '=', $keywrd)
                ->orWhere('email', '=', $keywrd)
                ->orWhere('grade', '=', $keywrd)
                ->orWhere('district', '=', $keywrd)
                ->orWhere('dob', '=', $keywrd)
                ->paginate(10);
            return view('student.index')
                ->with('students', $students);
        }else{
            $students = DB::table('students')
                ->whereNull('deleted_at')
                ->paginate(10);
            return view('student.index')
                ->with('students', $students);
        }

    }

    public function handleIndex()
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
        $results = $students->get();
        if(empty($results)) {
            return response()->json(['data' => $results,
                'status' => 'SUCCESS',
                'message' => 'No result availabe '
            ]);
        }else{
            return response()->json(['data' => $results,
                'status' => 'SUCCESS',
                'message' => 'The availabe result'
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
        $department = new Department;
        $data = $department->select_department();
        return view('student.create',['department' => $data]);
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
            'rollno' => 'required|unique:students',
            'email' => 'required|email|unique:students',
            'phone' => 'required|max:10',
            'degree' => 'required',
            'department' => 'required',
            'section' => 'required',
            'dob' => 'required|date|after:01/01/1970',
            //'photo' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('student/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $filename = '';
            $student = Input::all();
            if (Input::file('photo')) {

                $file = array_get($student,'photo');                    //get image name
                $img_extension = $file->getClientOriginalName();   //get image extension
                $filename = $request['rollno'] . '-' . $request['name'].''.$img_extension;
                $destinationPath = public_path().'/images/profile/students';   //image upload path
                $file->move($destinationPath, str_replace (" ", "", $filename));
            }

            $student['photo'] = str_replace (" ", "", $filename);

            Student::create($student);

            return redirect('/student')
                ->with('success', 'Student created successfully');
        }

    }
    public function Apistore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'rollno' => 'required|unique:students',
            'email' => 'required|email|unique:students',
            'phone' => 'required|max:10',
            'degree' => 'required',
            'department' => 'required',
            'section' => 'required',
            'dob' => 'required|date|after:01/01/1970',
            //'photo' => 'required',
        ]);
        if ($validator->fails()) {
            $rcheck = DB::table('students')->where('rollno','=', $request['rollno'])->first();
            if(!empty($rcheck)){
                return response()->json(['data' => Null,
                    'status' => 'ERROR',
                    'message' => 'This RollNo id already exist..!!'
                ]);
            }
            $echeck = DB::table('students')->where('email','=', $request['email'])->first();
            if(!empty($echeck)){
                return response()->json(['data' => Null,
                    'status' => 'ERROR',
                    'message' => 'This Email id already exist..!!'
                ]);
            }
            $data = array(
                'status' => 'ERROR',
                'message' => 'Validation error occurs',
                // 'data'      => json_encode($staff),
            );
            return response($data, 500);
        } else {
            $filename = '';
            $student = Input::all();
            if (Input::file('photo')) {

                $file = array_get($student,'photo');                    //get image name
                $img_extension = $file->getClientOriginalName();   //get image extension
                $filename = $request['rollno'] . '-' . $request['name'].''.$img_extension;
                $destinationPath = public_path().'/images/profile/students';   //image upload path
                $file->move($destinationPath, str_replace (" ", "", $filename));
            }

            $student['photo'] = str_replace (" ", "", $filename);

            Student::create($student);

            return response()->json(['data' => $student,
                'status' => 'SUCCESS',
                'message' => 'Student created successfully'
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
       $student = DB::table('students')->where('id', '=', $id)->sharedLock()->first();
        return view('student.view')
            ->with('student', $student);
	}
    public function Apishow($id)
    {
        $student = DB::table('students')->where('id', '=', $id)->sharedLock()->first();

        if($student) {
            return response()->json(['data' => $student,
                'status' => 'SUCCESS',
                'message' => 'The availabe result'
            ]);
        }else{
            return response()->json(['data' => $student,
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
        $student = DB::table('students')->where('id', '=', $id)->lockForUpdate()->first();
        $department = new Department;
        $data = $department->select_department();
        return view('student.update',['department' => $data])
            ->with('student', $student);
	}

    public function Apiedit($id)
    {
        $student = DB::table('students')->where('id', '=', $id)->lockForUpdate()->first();

        if($student) {
            return response()->json(['data' => $student,
                'status' => 'SUCCESS',
                'message' => 'The availabe result'
            ]);
        }else {
            return response()->json(['data' => $student,
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
        if (Input::file('photo')) {
            $student = Input::except('_token', 'rollno','email');
        }else {
             $student = Input::except('_token', 'photo', 'rollno','email');
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            //'rollno' => 'required|unique:students',
           // 'email' => 'required|email|unique:students',
            'phone' => 'required|max:10',
            'degree' => 'required',
            'department' => 'required',
            'section' => 'required',
            'dob' => 'required|date|after:01/01/1970',
            //'photo' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('student/edit/'. $id)
                ->withErrors($validator)
                ->withInput();
        } else {

            if (Input::file('photo')) {
                $file = array_get($student,'photo');                    //get image name
                $img_extension = $file->getClientOriginalName();   //get image extension
                $filename = $request['rollno'] . '-' . $request['name'].''.$img_extension;
                $destinationPath = public_path().'/images/profile/students';   //image upload path
                $file->move($destinationPath, str_replace (" ", "", $filename));
                $student['photo'] = str_replace (" ", "", $filename);
            }

            DB::table('students')
                ->where('id', $id)
                ->update($student);

            return redirect('/student')
                ->with('success', 'Student updated successfully');

        }

	}

    public function Apiupdate(Request $request)
    {
        $id = Input::get('id');
        if (Input::file('photo')) {
            $student = Input::except('_token', 'rollno','email');
        }else {
            $student = Input::except('_token', 'photo', 'rollno','email');
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            //'rollno' => 'required|unique:students',
            'email' => 'required|email|unique:students',
            'phone' => 'required|max:10',
            'degree' => 'required',
            'department' => 'required',
            'section' => 'required',
            'dob' => 'required|date|after:01/01/1970',
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
            $filename = '';
            if (Input::file('photo')) {
                $student = Input::all();
                $file = array_get($student,'photo');                    //get image name
                $img_extension = $file->getClientOriginalName();   //get image extension
                $filename = $request['rollno'] . '-' . $request['name'].''.$img_extension;
                $destinationPath = public_path().'/images/profile/students';   //image upload path
                $file->move($destinationPath, str_replace (" ", "", $filename));
            }

            $student['photo'] = str_replace (" ", "", $filename);
            DB::table('students')
                ->where('id', $id)
                ->update($student);

            return response()->json(['data' => $student,
                'status' => 'SUCCESS',
                'message' => 'Student updated successfully'
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
        DB::table('students')
            ->where('id', $id)
            ->update([
                'deleted_at' => 1,
            ]);

        return redirect('/student')
            ->with('success', 'Student Soft Deleted successfully');
	}
    public function Apidestroy($id)
    {
        DB::table('students')
            ->where('id', $id)
            ->update([
                'deleted_at' => 1,
            ]);

        return response()->json(['data' => true,
        'status' => 'SUCCESS',
        'message' => 'Student Soft Deleted successfully'
        ]);
    }

}
