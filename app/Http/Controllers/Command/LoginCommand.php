<?php

namespace App\Http\Controllers\Command;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginCommand extends Controller
{
    const command = "USER_ACCESS";


    private $email = "";
    private $type = "";

    function __construct($email, $type)
    {
    	$this->email = $email;
    	$this->type = $type;
    }


    public function getEmail(){
    	return $this->email;
    }

    public function getType(){
    	return $this->type;
    }
}
