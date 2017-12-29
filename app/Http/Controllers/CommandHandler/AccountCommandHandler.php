<?php

namespace App\Http\Controllers\CommandHandler;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Controllers\Command\AccountDepositeCommand;
use App\Http\Controllers\Event\CreateDepositeEvent;
use App\Http\Controllers\Event\EventStore;
use App\Http\Controllers\EventHandler\EventHandler;

class AccountCommandHandler extends Controller
{
    //
    private $accDepoCommand = "";


    function __construct(AccountDepositeCommand $accDepoCommand){
        $this->accDepoCommand = $accDepoCommand;
    }


    public function handleDeposite(){
        $accHolder = $this->accDepoCommand->getHolder();
        $amount = $this->accDepoCommand->getAmount();

        $createEvent = new CreateDepositeEvent();
        $event =  $createEvent->createEvent($accHolder, $amount);


        $eventSore = new EventStore($event, AccountDepositeCommand::command);
        $eventSore->storeEvent();


        $eventHandle = new EventHandler($event, AccountDepositeCommand::command);
        $eventHandle->handle();
    }
        
}
