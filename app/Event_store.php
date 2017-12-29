<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event_store extends Model
{
    //
    protected $fillable = array('command', 'event', 'status', 'remember_token', 'created_at', 'updated_at');
}
