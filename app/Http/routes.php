<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
    return View::make('login');
});
Route::group(['prefix'=> 'hod',  'middleware' => 'App\Http\Middleware\AdminMiddleware'], function () {
    Route::get('/', 'HodController@index');
    Route::get('/create', 'HodController@create');
    Route::post('/create', 'HodController@create');
    Route::get('/store', 'HodController@store');
    Route::post('/store', 'HodController@store');
    Route::get('/show/{id}', 'HodController@show');
    Route::post('/show/{id}', 'HodController@show');
    Route::get('/edit/{id}', 'HodController@edit');
    Route::post('/edit/{id}', 'HodController@edit');
    Route::get('/update', 'HodController@update');
    Route::post('/update', 'HodController@update');
    Route::get('/delete/{id}', 'HodController@destroy');
    Route::post('/delete/{id}', 'HodController@destroy');
});

Route::group(['prefix'=> 'staff',  'middleware' => 'App\Http\Middleware\AdminMiddleware'], function (){
    Route::get('/', 'StaffController@index');
    Route::get('/create', 'StaffController@create');
    Route::post('/create', 'StaffController@create');
    Route::get('/store', 'StaffController@store');
    Route::post('/store', 'StaffController@store');
    Route::get('/show/{id}', 'StaffController@show');
    Route::post('/show/{id}', 'StaffController@show');
    Route::get('/edit/{id}', 'StaffController@edit');
    Route::post('/edit/{id}', 'StaffController@edit');
    Route::get('/update', 'StaffController@update');
    Route::post('/update', 'StaffController@update');
    Route::get('/delete/{id}', 'StaffController@destroy');
    Route::post('/delete/{id}', 'StaffController@destroy');
    Route::get('/attendance/store', 'AttendanceController@Attendancestore');
    Route::post('/attendance/store', 'AttendanceController@Attendancestore');
    Route::get('/attendance/search', 'AttendanceController@index');
    Route::post('/attendance/search', 'AttendanceController@index');
    Route::get('/mark/store', 'MarkController@Markstore');
    Route::post('/mark/store', 'MarkController@Markstore');
    Route::get('/mark/search', 'MarkController@index');
    Route::post('/mark/search', 'MarkController@index');
    Route::get('/photo/{filename}', 'StaffController@getStaffPhoto');
    Route::get('/mail', 'StaffController@sendEmail');
});

Route::group(['prefix'=> 'student',  'middleware' => 'App\Http\Middleware\AdminMiddleware'], function (){
    Route::get('/', 'StudentController@index');
    Route::get('/search', 'StudentController@searchIndex');
    Route::post('/search', 'StudentController@searchIndex');
    Route::get('/create', 'StudentController@create');
    Route::post('/create', 'StudentController@create');
    Route::get('/store', 'StudentController@store');
    Route::post('/store', 'StudentController@store');
    Route::get('/show/{id}', 'StudentController@show');
    Route::post('/show/{id}', 'StudentController@show');
    Route::get('/edit/{id}', 'StudentController@edit');
    Route::post('/edit/{id}', 'StudentController@edit');
    Route::get('/update', 'StudentController@update');
    Route::post('/update', 'StudentController@update');
    Route::get('/delete/{id}', 'StudentController@destroy');
    Route::post('/delete/{id}', 'StudentController@destroy');
    Route::get('/attendance/show', 'AttendanceController@show');
    Route::post('/attendance/show', 'AttendanceController@show');
    Route::get('/mark/show', 'MarkController@show');
    Route::post('/mark/show', 'MarkController@show');
    Route::get('/mark/addsem/{id}', 'MarkController@addsem');
    Route::post('/mark/addsem/{id}', 'MarkController@addsem');
    Route::get('/mark/add_marks', 'MarkController@addmark');
    Route::post('/mark/add_marks', 'MarkController@addmark');
    Route::get('/mark/store_marks', 'MarkController@storemark');
    Route::post('/mark/store_marks', 'MarkController@storemark');
    Route::get('/mark/view_marks/{id}', 'MarkController@viewmark');
    Route::post('/mark/view_marks/{id}', 'MarkController@viewmark');
    Route::get('/mark/edit_marks/{id}', 'MarkController@editmark');
    Route::post('/mark/edit_marks/{id}', 'MarkController@editmark');
    Route::get('/mark/update_marks', 'MarkController@updatemark');
    Route::post('/mark/update_marks', 'MarkController@updatemark');
    Route::get('/mark/store_updated_marks', 'MarkController@storeUpdatemark');
    Route::post('/mark/store_updated_marks', 'MarkController@storeUpdatemark');
});

Route::group(['prefix'=> 'course',  'middleware' => 'App\Http\Middleware\AdminMiddleware'], function () {
    Route::get('/department', 'DepartmentController@index');
    Route::get('/department/create', 'DepartmentController@create');
    Route::post('/department/create', 'DepartmentController@create');
    Route::get('/department/store', 'DepartmentController@store');
    Route::post('/department/store', 'DepartmentController@store');
    Route::get('/department/show/{id}', 'DepartmentController@show');
    Route::post('/department/show/{id}', 'DepartmentController@show');
    Route::get('/department/edit/{id}', 'DepartmentController@edit');
    Route::post('/department/edit/{id}', 'DepartmentController@edit');
    Route::get('/department/update', 'DepartmentController@update');
    Route::post('/department/update', 'DepartmentController@update');
    Route::get('/department/delete/{id}', 'DepartmentController@destroy');
    Route::post('/department/delete/{id}', 'DepartmentController@destroy');

    Route::get('/subject', 'SubjectController@index');
    Route::get('/subject/create', 'SubjectController@create');
    Route::post('/subject/create', 'SubjectController@create');
    Route::get('/subject/store', 'SubjectController@store');
    Route::post('/subject/store', 'SubjectController@store');
    Route::get('/subject/show/{id}', 'SubjectController@show');
    Route::post('/subject/show/{id}', 'SubjectController@show');
    Route::get('/subject/edit/{id}', 'SubjectController@edit');
    Route::post('/subject/edit/{id}', 'SubjectController@edit');
    Route::get('/subject/update', 'SubjectController@update');
    Route::post('/subject/update', 'SubjectController@update');
    Route::get('/subject/delete/{id}', 'SubjectController@destroy');
    Route::post('/subject/delete/{id}', 'SubjectController@destroy');
});

Route::group(['prefix'=> 'event',  'middleware' => 'App\Http\Middleware\AdminMiddleware'], function () {
    Route::get('/', 'EventController@index');
    Route::get('/create', 'EventController@create');
    Route::post('/create', 'EventController@create');
    Route::get('/store', 'EventController@store');
    Route::post('/store', 'EventController@store');
    Route::get('/show/{id}', 'EventController@show');
    Route::post('/show/{id}', 'EventController@show');
    Route::get('/edit/{id}', 'EventController@edit');
    Route::post('/edit/{id}', 'EventController@edit');
    Route::get('/update', 'EventController@update');
    Route::post('/update', 'EventController@update');
    Route::get('/delete/{id}', 'EventController@destroy');
    Route::post('/delete/{id}', 'EventController@destroy');
});

Route::group(['prefix'=> 'chat',  'middleware' => 'App\Http\Middleware\AdminMiddleware'], function () {
    Route::get('/', 'ChatController@index');
    Route::get('/create', 'ChatController@create');
    Route::post('/create', 'ChatController@create');
    Route::get('/store', 'ChatController@store');
    Route::post('/store', 'ChatController@store');
    Route::get('/show', 'ChatController@show');
    Route::post('/show', 'ChatController@show');
});

Route::group(['prefix'=> 'admin', 'middleware' => 'App\Http\Middleware\AdminMiddleware'], function (){
    Route::get('/', 'AdminController@index');
    Route::get('/myaccount', 'AdminController@myaccount');
    Route::get('/reset_password', 'AdminController@resetPassword');
    Route::get('/reset_password', 'AdminController@resetPassword');
    Route::get('/change_password', 'AdminController@changePassword');
    Route::post('/change_password', 'AdminController@changePassword');
});

Route::group(['prefix'=> 'admin' ], function (){
    Route::post('/authenticate','LoginController@Webauthenticate');
});

Route::group(['prefix'=> 'reports' ], function (){
    Route::post('/stud_mail','AttendanceController@sendWeeklyMailReportsStud');
    Route::get('/stud_mail','AttendanceController@sendWeeklyMailReportsStud');
    Route::post('/hod_mail','AttendanceController@sendMonthlyMailHod');
    Route::get('/hod_mail','AttendanceController@sendMonthlyMailHod');
    Route::post('/search/{parameter}','AttendanceController@monthlyReportSearch');
    Route::get('/search/{parameter}','AttendanceController@monthlyReportSearch');
    Route::post('/monthly_report','AttendanceController@getMonthlyReports');
    Route::get('/monthly_report','AttendanceController@getMonthlyReports');
});

// Login, Register and Logout
    Route::post('/login','LoginController@Webauthenticate');
    Route::get('/logout', 'Auth\AuthController@getLogout');
    Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
    Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::group(['prefix'=> '/v1.0/api'], function () {
    Route::get('/login', 'LoginController@Apiauthenticate');
    Route::post('/login', 'LoginController@Apiauthenticate');
});

Route::group(['prefix'=> '/v1.0/api/staff'], function (){
    Route::get('/', 'StaffController@AllStaff');
    Route::get('/create', 'StaffController@Apistore');
    Route::post('/create', 'StaffController@Apistore');
    Route::get('/show/{id}', 'StaffController@Apishow');
    Route::post('/show/{id}', 'StaffController@Apishow');
    Route::get('/edit/{id}', 'StaffController@Apiedit');
    Route::post('/edit/{id}', 'StaffController@Apiedit');
    Route::get('/update/{id}', 'StaffController@Apiupdate');
    Route::post('/update/{id}', 'StaffController@Apiupdate');
    Route::get('/delete/{id}', 'StaffController@Apidestroy');
    Route::post('/delete/{id}', 'StaffController@Apidestroy');
    Route::get('/change_password', 'StaffController@changePassword');
    Route::post('/change_password', 'StaffController@changePassword');

});

Route::group(['prefix'=> '/v1.0/api/student'], function (){
    Route::get('/login','LoginController@Apiauthenticate');
    Route::post('/login','LoginController@Apiauthenticate');
    Route::get('/', 'StudentController@AllStudent');
    Route::get('/search', 'StudentController@handleIndex');
    Route::post('/search', 'StudentController@handleIndex');
    Route::get('/searchlike', 'StudentController@searchIndex');
    Route::post('/searchlike', 'StudentController@searchIndex');
    Route::get('/create', 'StudentController@Apistore');
    Route::post('/create', 'StudentController@Apistore');
    Route::get('/show/{id}', 'StudentController@Apishow');
    Route::post('/show/{id}', 'StudentController@Apishow');
    Route::get('/edit/{id}', 'StudentController@Apiedit');
    Route::post('/edit/{id}', 'StudentController@Apiedit');
    Route::get('/update/{id}', 'StudentController@Apiupdate');
    Route::post('/update/{id}', 'StudentController@Apiupdate');
    Route::get('/delete/{id}', 'StudentController@Apidestroy');
    Route::post('/delete/{id}', 'StudentController@Apidestroy');
    Route::get('/attendance', 'AttendanceController@ApiAttendancestore');
    Route::post('/attendance', 'AttendanceController@ApiAttendancestore');
    Route::get('/attendance/report', 'AttendanceController@ApishowReport');
    Route::post('/attendance/report', 'AttendanceController@ApishowReport');
    Route::get('/mark/add_marks', 'MarkController@Apiaddmark');
    Route::post('/mark/add_marks', 'MarkController@Apiaddmark');
    Route::get('/mark/store_marks', 'MarkController@Apistoremark');
    Route::post('/mark/store_marks', 'MarkController@Apistoremark');
    Route::get('/mark/view_marks', 'MarkController@Apiviewmark');
    Route::post('/mark/view_marks', 'MarkController@Apiviewmark');
    Route::get('/mark/update_marks', 'MarkController@Apiupdatemark');
    Route::post('/mark/update_marks', 'MarkController@Apiupdatemark');
    Route::get('/mark/store_updated_marks', 'MarkController@ApistoreUpdatemark');
    Route::post('/mark/store_updated_marks', 'MarkController@ApistoreUpdatemark');

});
Route::group(['prefix'=> '/v1.0/api/event'], function (){
    Route::get('/', 'EventController@Apiindex');
    Route::get('/create', 'EventController@Apistore');
    Route::post('/create', 'EventController@Apistore');
    Route::get('/show/{id}', 'EventController@Apishow');
    Route::post('/show/{id}', 'EventController@Apishow');
    Route::get('/edit/{id}', 'EventController@Apiedit');
    Route::post('/edit/{id}', 'EventController@Apiedit');
    Route::get('/update', 'EventController@Apiupdate');
    Route::post('/update', 'EventController@Apiupdate');
    Route::get('/delete/{id}', 'EventController@Apidestroy');
    Route::post('/delete/{id}', 'EventController@Apidestroy');
});

Route::group(['prefix'=> '/v1.0/api/course'], function (){
    Route::get('/departments', 'DepartmentController@ApiDepartment');
    Route::post('/departments', 'DepartmentController@ApiDepartment');
    Route::get('/semesters', 'DepartmentController@ApiSemester');
    Route::post('/semesters', 'DepartmentController@ApiSemester');
});

Route::group(['prefix'=> '/v1.0/api/chat'], function (){
    Route::get('/user', 'ChatController@Userindex');
    Route::get('/create', 'ChatController@create');
    Route::post('/create', 'ChatController@create');
    Route::get('/send', 'ChatController@Apistore');
    Route::post('/send', 'ChatController@Apistore');
    Route::get('/show', 'ChatController@Apishow');
    Route::post('/show', 'ChatController@Apishow');
    Route::get('/delete', 'ChatController@Apidestroy');
    Route::post('/delete', 'ChatController@Apidestroy');
});
