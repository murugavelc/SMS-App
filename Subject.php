<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'subjects';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public $fillable = ['name', 'department', 'year', 'sem'];

}
