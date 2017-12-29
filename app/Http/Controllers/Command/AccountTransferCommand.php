<?php

namespace App\Http\Controllers\Command;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountTransferCommand extends Controller
{
    const command = "CREDIT_TRANSFER";


    private $receiver = "";
    private $sender = "";
    private $amount = "";

    function __construct($sender, $receiver, $amount)
    {
        $this->receiver = $receiver;
    	$this->sender = $sender;
    	$this->amount = $amount;
    }


    public function getReceiver(){
        return $this->receiver;
    }

    public function getSender(){
    	return $this->sender;
    }

    public function getAmount(){
    	return $this->amount;
    }
}
