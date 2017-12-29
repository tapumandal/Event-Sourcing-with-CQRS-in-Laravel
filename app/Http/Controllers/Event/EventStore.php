<?php

namespace App\Http\Controllers\Event;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Event_store;

class EventStore extends Controller
{	
	private $event="";
	private $command="";

    function __construct($event, $command){
    	$this->event = $event;
    	$this->command = $command;
    }

    public function storeEvent(){
    	// DB::table('event_store')->insert('command', $this->command, 'event', $this->event);
    	$eventStore = new Event_Store();

		$eventStore->command = $this->command;    	
		$eventStore->event = $this->event;
		$eventStore->status = "published";
		$eventStore->created_at = now();
		$eventStore->updated_at = now();


		$eventStore->save();
    }	
}
