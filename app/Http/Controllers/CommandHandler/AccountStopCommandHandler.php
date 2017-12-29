<?php

namespace App\Http\Controllers\CommandHandler;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Controllers\Command\AccountDepositeCommand;
use App\Http\Controllers\Event\CreateDepositeEvent;
use App\Http\Controllers\Event\CreateDeleteEvent;
use App\Http\Controllers\Event\CreateStopEvent;
use App\Http\Controllers\Event\EventStore;
use App\Http\Controllers\EventHandler\EventHandler;

use App\Http\Controllers\CommandHandler\AccountDeleteCommandHandler;
use App\Http\Controllers\Command\AccountDeleteCommand;
use App\Http\Controllers\Command\AccountStopCommand;

class AccountStopCommandHandler extends Controller
{
    //
    private $stopTrans = "";


    function __construct(AccountStopCommand $stopTrans){
        $this->stopTrans = $stopTrans;
    }


    public function handleStropTran(){
        $stopId = $this->stopTrans->getTransectionId();
        $stopSender = $this->stopTrans->getTransectionSender();
        $stopReceiver = $this->stopTrans->getTransectionReceiver();
        $stopAmount = $this->stopTrans->getTransectionAmount();

        $createEvent = new CreateStopEvent();
        $event =  $createEvent->createEvent($stopId, $stopSender, $stopReceiver, $stopAmount);
        
      

        $eventSore = new EventStore($event, AccountStopCommand::command);
        $eventSore->storeEvent();


        $eventHandle = new EventHandler($event, AccountStopCommand::command);
        $eventHandle->handle();
        
    }
        
}
