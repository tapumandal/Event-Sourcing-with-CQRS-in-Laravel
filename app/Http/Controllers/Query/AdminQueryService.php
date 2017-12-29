<?php

namespace App\Http\Controllers\Query;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

class AdminQueryService extends Controller
{
    //
	private $email="";
    
    // function __construct($email){
    // 	$this->email = $email;
    // }

    public function getAccountsList(){
        
    	$accounts = DB::table('deposits')->get();
    	
    	return $accounts;
    }


    public function getHistory(){
        $history = DB::table('event_stores')->get();
        
        return $history;
    }
}
