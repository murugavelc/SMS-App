<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Department extends Model {

    /**
     * The databaDepartmentse table used by the model.
     *
     * @var string
     */
    protected $table = 'departments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public $fillable = ['name'];
    
    public function select_department()
    {
        $department = DB::table('departments')->get();
        return $department;
    }
}
