<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'staff_details';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

	public $fillable = ['user_id', 'emp_id', 'degree', 'department', 'date_of_join'];

}
