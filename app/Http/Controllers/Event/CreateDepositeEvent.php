<?php

namespace App\Http\Controllers\Event;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreateDepositeEvent extends Controller
{
    

    public function createEvent($accHolder, $amount){


    	// echo $accHolder;
    	
    	$event = array('email' => $accHolder, 'amount' => $amount);

    	$event = json_encode($event);
    	return $event;

    }
}
