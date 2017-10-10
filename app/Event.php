<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'events';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public $fillable = ['title', 'description', 'guest', 'organizer', 'starts_on', 'ends_up', 'venue'];
}
