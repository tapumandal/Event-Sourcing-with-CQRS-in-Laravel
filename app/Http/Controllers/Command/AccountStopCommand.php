<?php

namespace App\Http\Controllers\Command;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountStopCommand extends Controller
{
    const command = "STOP_TRANSECTION";


    private $id = "";
    private $sender = "";
    private $receiver = "";
    private $amount = "";

    function __construct($id, $sender, $receiver, $amount)
    {
    	$this->id = $id;
    	$this->sender = $sender;
    	$this->receiver = $receiver;
    	$this->amount = $amount;
    }


    public function getTransectionId(){
    	return $this->id;
    } 

    public function getTransectionSender(){
    	return $this->sender;
    }

    public function getTransectionReceiver(){
    	return $this->receiver;
    }

    public function getTransectionAmount(){
    	return $this->amount;
    }

}
