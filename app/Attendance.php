<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'attendances';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public $fillable = ['stud_id', 'status','date'];
}
