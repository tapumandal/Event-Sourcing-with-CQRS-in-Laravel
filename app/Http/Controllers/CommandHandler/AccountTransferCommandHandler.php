<?php

namespace App\Http\Controllers\CommandHandler;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Controllers\Command\AccountTransferCommand;
use App\Http\Controllers\Event\CreateDepositeEvent;
use App\Http\Controllers\Event\CreateTransferEvent;
use App\Http\Controllers\Event\EventStore;
use App\Http\Controllers\EventHandler\EventHandler;

class AccountTransferCommandHandler extends Controller
{
    //
    private $accTransCommand = "";


    function __construct(AccountTransferCommand $accTransCommand){
        $this->accTransCommand = $accTransCommand;
    }


    public function handleTransfer(){
        $accHolder = $this->accTransCommand->getSender();
        $accReceiver = $this->accTransCommand->getReceiver();
        $amount = $this->accTransCommand->getAmount();

        $createEvent = new CreateTransferEvent();
        $event =  $createEvent->createEvent($accHolder, $accReceiver, $amount);


        $eventSore = new EventStore($event, AccountTransferCommand::command);
        $eventSore->storeEvent();


        $eventHandle = new EventHandler($event, AccountTransferCommand::command);
        $eventHandle->handle();
    }
        
}
