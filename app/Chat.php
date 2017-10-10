<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'chats';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public $fillable = ['sender_id', 'receiver_id', 'msg'];
}
