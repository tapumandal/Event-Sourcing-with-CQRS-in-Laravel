<?php

namespace App\Http\Controllers\Event;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreateTransferEvent extends Controller
{
    

    public function createEvent($sender, $receiver, $amount){


    	// echo $accHolder;
    	
    	$event = array('receiver' => $receiver, 'sender' => $sender, 'amount' => $amount);

    	$event = json_encode($event);
    	return $event;

    }
}
