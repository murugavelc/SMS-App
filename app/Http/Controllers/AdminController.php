<?php namespace App\Http\Controllers;

use App\Event;
use App\Hod;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Staff;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use \Input as Input;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function index()
    {
        return view('admin.home')
            ->with('staffs', count(Staff::whereNull('deleted_at')->get()))
            ->with('students', count(Student::whereNull('deleted_at')->get()))
            ->with('hods', count(Hod::whereNull('deleted_at')->get()))
            ->with('events', count(Event::whereNull('deleted_at')->get()));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function resetPassword(Request $request)
    {
        return view('admin.reset_password');
    }

    public function changePassword(Request $request)
    {
        $id = Input::get('id');
        $this->validate($request, [
            'password' => 'required|confirmed',

        ]);
        $user = User::findOrFail($id);
        $input = $request->input();
        //Change Password if password value is set
        if ($input['password'] != "") {
            //dd(bcrypt($input['password']));
            $input['password'] = Hash::make($input['password']);
        }
        $user->fill($input)->save();

        return redirect('/admin')
            ->with('success', 'Password changed successfully');
    }
}
