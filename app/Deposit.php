<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    //

    protected $fillable = array('email', 'amount', 'created_at', 'updated_at');
}
