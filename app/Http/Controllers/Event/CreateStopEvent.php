<?php

namespace App\Http\Controllers\Event;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreateStopEvent extends Controller
{
    

    public function createEvent($stopId, $stopSender, $stopReceiver, $stopAmount){


    	// echo $accHolder;
    	
    	$event = array('id' => $stopId, 'sender' => $stopSender, 'receiver' => $stopReceiver, 'amount' => $stopAmount);

    	$event = json_encode($event);
    	return $event;

    }
}
