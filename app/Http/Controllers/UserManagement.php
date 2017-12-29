<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



class UserManagement extends Controller
{
    //

    public function redirect(){
    	$acHolder = Request();

        if($acHolder->user()->type == 'account_holder'){
        	return redirect('view');
		}else if($acHolder->user()->type == 'manager'){
			return redirect('manager');
		}
    }

    public function redirectUser(){
        $acHolder = Request();

        if($acHolder->user()->type == 'account_holder'){

        	$uri =  $_SERVER['REQUEST_URI'];
        	if($uri=="/view"){}
        	else if($uri=="/deposite"){}
        	else if($uri=="/transfer"){}
        	else{
        		return "redirect";
        	}
            // return redirect('view');
        }else if($acHolder->user()->type == 'manager'){
           	$uri =  $_SERVER['REQUEST_URI'];
        	if($uri=="/accountslist"){}
        	else if($uri=="/history"){}
        	else if($uri=="/delete"){}
            else if($uri=="/manager"){}
            else if($uri=="/stoptransection"){}
        	else{
        		return "redirect";
        	}
        }
    }

    
}
