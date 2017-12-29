<?php

namespace App\Http\Controllers\Command;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountDeleteCommand extends Controller
{
    const command = "DELETE_ACCOUNT";


    private $email = "";

    function __construct($email)
    {
    	$this->email = $email;
    }


    public function getAccount(){
    	return $this->email;
    }

}
