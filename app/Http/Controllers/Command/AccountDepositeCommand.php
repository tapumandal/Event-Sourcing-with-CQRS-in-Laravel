<?php

namespace App\Http\Controllers\Command;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountDepositeCommand extends Controller
{
    const command = "CREDIT_DEPOSITE";


    private $email = "";
    private $amount = "";

    function __construct($email, $amount)
    {
    	$this->email = $email;
    	$this->amount = $amount;
    }


    public function getHolder(){
    	return $this->email;
    }

    public function getAmount(){
    	return $this->amount;
    }
}
