<?php

namespace App\Http\Controllers\CommandHandler;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Controllers\Command\AccountDepositeCommand;
use App\Http\Controllers\Event\CreateDepositeEvent;
use App\Http\Controllers\Event\CreateDeleteEvent;
use App\Http\Controllers\Event\EventStore;
use App\Http\Controllers\EventHandler\EventHandler;

use App\Http\Controllers\CommandHandler\AccountDeleteCommandHandler;
use App\Http\Controllers\Command\AccountDeleteCommand;

class AccountDeleteCommandHandler extends Controller
{
    //
    private $deleteAccount = "";


    function __construct(AccountDeleteCommand $deleteAccount){
        $this->deleteAccount = $deleteAccount;
    }


    public function handleAccDelete(){
        $accDelete = $this->deleteAccount->getAccount();

        $createEvent = new CreateDeleteEvent();
        $event =  $createEvent->createEvent($accDelete);
        
        $eventSore = new EventStore($event, AccountDeleteCommand::command);
        $eventSore->storeEvent();


        $eventHandle = new EventHandler($event, AccountDeleteCommand::command);
        $eventHandle->handle();
    }
        
}
