<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use DB;
use Mail;
use App\Student;
use App\Attendance;
use App\Department;
use \Input as Input;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\Crypt;

class AttendanceController extends Controller {

    protected $url;

    public function __construct(UrlGenerator $url)
    {
        $this->url = $url;
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
    {
        $department = new Department;
        $data = $department->select_department();
        return view('student.attendance.index',['department' => $data]);

    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
    {

    }


    /**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function Attendancestore(Request $request)
	{
         $input = $request->input('data');
         $attendance = json_decode($input, true);
         $studcount=count($attendance['std']);
            foreach ($attendance['std'] as $student) {
                for ($i = 0; $i <= $studcount; $i++) {
                    $stud_id = $student['id'];
                    $attance = $student['status'];
                    $cdate = date('Y-m-d');
                }
                $check = Attendance::where('stud_id', '=', $stud_id)->where('date', '=', $cdate)->count();
                if ($check == 0) {
                    $result = Attendance::create([
                        'stud_id' => $stud_id,
                        'status' => $attance,
                        'date' => $cdate,
                    ]);

                }
            }
            if(empty($result)){
                return response()->json(['data' => Null,
                    'status' => 'ERROR',
                    'message' => 'Today Attendance closed already'
                ]);
            }else{
                return response()->json(['data' => $studcount,
                    'status' => 'SUCCESS',
                    'message' => 'Today Attendance submitted successfully'
                ]);
            }
    }
    public function ApiAttendancestore(Request $request)
    {
        $input = $request->input('data');
        $attendance = json_decode($input, true);
        $studcount=count($attendance['std']);
        foreach ($attendance['std'] as $student) {
            for ($i = 0; $i <= $studcount; $i++) {
                $stud_id = $student['id'];
                $attance = $student['status'];
                $cdate = date('Y-m-d');
            }
            $check = Attendance::where('stud_id', '=', $stud_id)->where('date', '=', $cdate)->count();
            if ($check == 0) {
                $result = Attendance::create([
                    'stud_id' => $stud_id,
                    'status' => $attance,
                    'date' => $cdate,
                ]);

            }
        }
        if(empty($result)){
            return response()->json(['data' => Null,
                'status' => 'ERROR',
                'message' => 'Today Attendance closed already'
            ]);
        }else{
            return response()->json(['data' => $studcount,
                'status' => 'SUCCESS',
                'message' => 'Today Attendance submitted successfully'
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

        return view('student.attendance.students_list')
            ->with('students', $studentsList);
	}

	public function ApishowReport(){
        $degree = Input::get('degree');
        $department = preg_replace('/\s+/', ' ',  Input::get('department'));
        $year = Input::get('year');
        $section = Input::get('section');
        $date = Input::get('date');
        $startdate = Input::get('startdate');
        $endate = Input::get('endate');
        $chkdate = date('Y-m-d');
        if($date<=$chkdate && $date != '') {
            $attnReport = DB::table('students')
                ->select('students.id', 'students.name', 'students.photo', 'attendances.status as attendances', 'attendances.date as date')
                ->leftJoin('attendances', 'students.id', '=', 'attendances.stud_id')
                ->where('students.degree', '=', $degree)
                ->where('students.department', '=', $department)
                ->where('students.year', '=', $year)
                ->where('students.section', '=', $section)
                ->where('attendances.date', '=', $date)
                ->get();

            return response()->json(['data' => $attnReport,
                'status' => 'SUCCESS',
                'message' => 'The availabe Reports'
            ]);
        }
        elseif ($startdate && $endate != ''){

            $attnReport = DB::table('students')
                ->select('students.id', 'students.name', 'students.photo', 'attendances.status as attendances','attendances.date as date' )
                ->leftJoin('attendances', 'students.id', '=', 'attendances.stud_id')
                ->where('students.degree', '=', $degree)
                ->where('students.department', '=', $department)
                ->where('students.year', '=', $year)
                ->where('students.section', '=', $section)
                ->whereBetween('attendances.date', array($startdate, $endate))
                ->get();

            return response()->json(['data' => $attnReport,
                'status' => 'SUCCESS',
                'message' => 'The availabe Reports'
            ]);

        }else{
            return response()->json(['data' => 'Invalid date Selection',
            'status' => 'ERROR',
            'message' => 'Not Available Reports']);
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
	public function destroy($id)
	{
		//
	}
// //////////*****************//////////////Weekly Report email//////////////****************/////////////
    public function sendWeeklyMailReportsStud()
    {

        $today_date = date('D');
        if ($today_date == 'Mon') {
        $last_dy = date('Y-m-d', strtotime("-1 days"));
        $last_week = date('Y-m-d', strtotime("-7 days"));
        // get extra mail addresses of recepients

       $students = DB::table('students')
            ->whereNull('deleted_at')
            ->get();
       if (!empty ($students)) {
            foreach ($students as $student) {
                $stud_id = $student->id;
               // if ($student->email == 'murugavel.c@vividinfotech.com') {
                    $attn_report = DB::table('attendances')
                        ->whereBetween('date', array($last_week, $last_dy))
                        ->where('stud_id', '=', $stud_id)
                        ->get();

                    // ////////// Instant mail ///////////////

                    $data = array(
                        'name' => $student->name,
                        'attn_report' => $attn_report,
                    );
                    Mail::send('emails.attn_weekly_report', $data, function ($message) use ($student) {

                        $message->from('murugavel.kcmr@gmail.com', 'SMS | Admin');
                        $message->to($student->email)->subject('Your Last Week Attendance details..!!');
                    });
               // }
                }
            }
        }
    }

    public function sendMonthlyMailHod()
    {
        $first_dy = date('Y-m-01');
        $last_dy = date('Y-m-t');
        $today_date = date('Y-m-d');
        if ($today_date == $last_dy) {
            $hods = DB::table('hods')
                ->whereNull('deleted_at')
                ->get();

            if (!empty ($hods)) {
                foreach ($hods as $hod) {

                    $parameter = [
                        'hod_id' => $hod->id,
                        'degree' => $hod->degree,
                        'dept' => $hod->department,
                        'first_dy' => $first_dy,
                        'last_dy' => $last_dy

                    ];
                    $parameter = Crypt::encrypt($parameter);
                    $link = $this->url->to('/reports/search', $parameter);

                    $data = array(
                        'name' => $hod->name,
                        'link' => $link,
                    );
                    Mail::send('emails.attn_monthly_report', $data, function ($message) use ($hod) {

                        $message->from('murugavel.kcmr@gmail.com', 'SMS | Admin');
                        $message->to($hod->email)->subject('Students Last Month Attendance details..!!');
                    });
                }
            }
        }
    }

    public function monthlyReportSearch($parameter)
    {
            $datas = Crypt::decrypt($parameter);
            $param = $parameter;
            $hod_id = $datas['hod_id'];
            $degree = $datas['degree'];
            $dept = $datas['dept'];
            $first_dy = $datas['first_dy'];
            $last_dy = $datas['last_dy'];
        return view('student.report.index',['department' => $dept, 'degree' => $degree, 'first_dy' => $first_dy, 'last_dy' => $last_dy, 'parameter' => $param ]);

    }
    // //////////*****************//////////////Monthly Report email//////////////****************/////////////
    public function getMonthlyReports()
    {
        $degree = Input::get('degree');
        $department = preg_replace('/\s+/', ' ',  Input::get('department'));
        $year = Input::get('year');
        $section = Input::get('section');
        $first_dy = Input::get('first_dy');
        $last_dy = Input::get('last_dy');
        $parameter = Input::get('parameter');

        $worked_date = DB::table('attendances')
            ->selectRaw('date')
            ->whereBetween('date', array('2017-03-31', '2017-05-31'))
            ->groupBy('date')
            ->get();

        $stud_report = DB::select("SELECT GROUP_CONCAT(status) as attn,students.rollno as rollno, 
            students.name as name, students.photo as photo
            FROM attendances INNER JOIN students ON students.id = attendances.stud_id  
            WHERE students.degree = '$degree' AND students.department = '$department' AND students.year = '$year' 
            AND students.section = '$section' AND attendances.date BETWEEN '2017-04-01' AND '2017-05-30' GROUP BY stud_id");

        return view('student.report.stud_monthly_attn_report')
            ->with('students', $stud_report)
            ->with('worked_date', $worked_date)
            ->with('parameter', $parameter);

    }
}
