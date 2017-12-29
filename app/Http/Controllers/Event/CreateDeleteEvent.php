<?php

namespace App\Http\Controllers\Event;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreateDeleteEvent extends Controller
{
    

    public function createEvent($accDelete){


    	// echo $accHolder;
    	
    	$event = array('email' => $accDelete);

    	$event = json_encode($event);
    	return $event;

    }
}
