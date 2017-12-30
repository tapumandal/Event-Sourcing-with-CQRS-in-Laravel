<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Controllers\CommandHandler\AccountDepositCommandHandler;
use App\Http\Controllers\CommandHandler\AccountTransferCommandHandler;
use App\Http\Controllers\Command\AccountDepositeCommand;
use App\Http\Controllers\Command\AccountTransferCommand;
use App\Http\Controllers\Query\QueryService;
use App\Http\Controllers\UserManagement;

class Accounts extends Controller
{
    //
        
    


    public function show(){
        $redirect = new UserManagement();
        $check = $redirect->redirectUser();
        if($check == "redirect"){
            return redirect('manager');
        }
       
        $acHolder = Request();
    	$show = new QueryService($acHolder->user()->email);

        $balance = $show->getBalance();
        return view('view', ['amount'=> $balance]);
    }


    public function deposite(){
        $redirect = new UserManagement();
        $check = $redirect->redirectUser();
        if($check == "redirect"){
            return redirect('manager');
        }



    	$acHolder = Request();

        if($acHolder->input('amount')){
            $handleAccDepo = new AccountDepositCommandHandler(new AccountDepositeCommand($acHolder->user()->email, $acHolder->input('amount')));

            $handleAccDepo->handleDeposite();

            return redirect("/view");
        }else{
            return view('deposit');
        }

    }


    public function transfer(){
        $redirect = new UserManagement();
        $check = $redirect->redirectUser();
        if($check == "redirect"){
            return redirect('manager');
        }


    	$acHolder = Request();

        if($acHolder->input('receiver')){
            
            $handleAmountTrans = new AccountTransferCommandHandler(new AccountTransferCommand($acHolder->user()->email, $acHolder->input('receiver'),  $acHolder->input('amount')));

            $handleAmountTrans->handleTransfer();

            return redirect("/view");
        }else{
            return view('transfer');
        }
    }
}
