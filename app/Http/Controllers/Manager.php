<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Controllers\CommandHandler\AccountCommandHandler;
use App\Http\Controllers\CommandHandler\AccountTransferCommandHandler;
use App\Http\Controllers\CommandHandler\AccountDeleteCommandHandler;
use App\Http\Controllers\Command\AccountDepositeCommand;
use App\Http\Controllers\Command\AccountTransferCommand;
use App\Http\Controllers\Command\AccountDeleteCommand;
use App\Http\Controllers\Query\AdminQueryService;
use App\Http\Controllers\UserManagement;

use App\Http\Controllers\CommandHandler\AccountStopCommandHandler;
use App\Http\Controllers\Command\AccountStopCommand;

class Manager extends Controller
{
    //
    function __construct(){
       
    }
    
    public function manage(){
        $redirect = new UserManagement();
        $check = $redirect->redirectUser();
        if($check == "redirect"){
            return redirect('view');
        }

        return view('manager.panel');
    }

    public function accountsList(){
        $redirect = new UserManagement();
        $check = $redirect->redirectUser();
        if($check == "redirect"){
            return redirect('view');
        }

        $acHolder = Request();
    	$show = new AdminQueryService();

        $accounts = $show->getAccountsList();
        return view('manager.accountlist', ['accounts'=> $accounts]);

        
    }

    public function history(){
        $redirect = new UserManagement();
        $check = $redirect->redirectUser();
        if($check == "redirect"){
            return redirect('view');
        }


        $acHolder = Request();
        $show = new AdminQueryService();

        $history = $show->getHistory();
        return view('manager.history', ['histories'=> $history]);   
    }

    public function delete(){
        $redirect = new UserManagement();
        $check = $redirect->redirectUser();
        if($check == "redirect"){
            return redirect('view');
        }


        $account = Request();

        if($account->input('account')){

            $handleAccDelete = new AccountDeleteCommandHandler(new AccountDeleteCommand($account->input('account')));

            $handleAccDelete->handleAccDelete();

            return redirect("/manager");
        }else{
            return view('manager');
        }
    }

    public function stopTransection(){
        $redirect = new UserManagement();
        $check = $redirect->redirectUser();
        if($check == "redirect"){
            return redirect('view');
        }


        $account = Request();

        if($account->input('stopid')){

            $handleAccDelete = new AccountStopCommandHandler(new AccountStopCommand($account->input('stopid'), $account->input('sender'),$account->input('receiver'),$account->input('amount')));

            $handleAccDelete->handleStropTran();

            return redirect("/manager");
            
        }else{
            // return view('manager');
        }
    }


}
