<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Hod extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'hods';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public $fillable = ['name', 'emp_id', 'gender', 'email','phone', 'degree', 'department', 'date_of_join', 'photo'];

}
