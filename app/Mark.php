<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Mark extends Model {


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'marks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public $fillable = ['stud_id','sem','subject','grade'];

    public function select_sem()
    {
        $semester = DB::table('semesters')->get();
        return $semester;
    }
}
