<?php

namespace App\Http\Controllers\Query;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

class QueryService extends Controller
{
    //
	private $email="";
    
    function __construct($email){
    	$this->email = $email;
    }

    public function getBalance(){
        $this->checkAccount($this->email);
    	$balance = DB::table('deposits')->select('amount')->where('email', $this->email)->first()->amount;
    	
    	return $balance;
    }

    public function checkAccount($email){
        $count  = DB::table('deposits')->where('email', $email)->count();
        if($count > 0){
        }else{
           DB::table('deposits')->insert( array('email' => $email, 'amount' => '0', 'created_at' => now(), 'updated_at' => now()));
           
        }
        

    }
}
