<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model {

    protected $table = 'students';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public $fillable = ['name', 'rollno', 'gender', 'dob', 'phone', 'email', 'degree', 'department', 'year', 'section', 'grade', 'fathername', 'fatheroccupation', 'mothername', 'motheroccupation', 'address', 'district', 'pincode', 'photo'];
}
