<?php

namespace App\Http\Controllers\EventHandler;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Deposit;
class EventHandler extends Controller
{
    //

    private $event="";
	private $command="";

    function __construct($event, $command){
    	$this->event = $event;
    	$this->command = $command;

    }

    public function handle(){
    	$event = json_decode($this->event);



    	if($this->command == "CREDIT_DEPOSITE"){
    		$this->deposite($event->email, $event->amount);
    	}else if($this->command == "CREDIT_TRANSFER"){

            $status = $this->transfer($event->sender, $event->amount);
            if($status == false){
                
                // die();
            }else{
                $this->deposite($event->receiver, $event->amount);    
            }
            
            
        }else if($this->command == "DELETE_ACCOUNT"){
            $this->delete($event->email);
        }
        else if($this->command == "STOP_TRANSECTION"){
            $this->stopTransection($event->id, $event->sender, $event->receiver, $event->amount);
        }

    	
    }

    public function deposite($email, $amount){
        
        $this->checkAccount($email);

		$amount += DB::table('deposits')->select('amount')->where('email', $email)->first()->amount;
		
		DB::table('deposits')
            ->where('email', $email)
            ->update(['amount' => $amount]);


    }

    public function transfer($email, $amount){
        $this->checkAccount($email);
        // Add to the receiver account 
        $amountTmp = DB::table('deposits')->select('amount')->where('email', $email)->first()->amount;
        $amount = $amountTmp-$amount; 
        echo $amount;
        if($amount<0){
            return false;
        }
        //$amount =  $amount->amount;
        DB::table('deposits')
            ->where('email', $email)
            ->update(['amount' => $amount]);

        return true;
    }

    public function checkAccount($email){
        $count  = DB::table('deposits')->where('email', $email)->count();
        if($count > 0){
         
        }else{
            echo 'NOT';
           DB::table('deposits')->insert( array('email' => $email, 'amount' => '0', 'created_at' => now(), 'updated_at' => now()));
         
        }

    }


    public function delete($email){
        DB::table('deposits')->where('email', '=', $email)->delete();
    }

    public function stopTransection($id, $sender, $receiver, $transAmount){
        $amountTmp = DB::table('deposits')->select('amount')->where('email', $receiver)->first()->amount;
        $amount = $amountTmp-$transAmount; 
        
        
        DB::table('deposits')
            ->where('email', $receiver)
            ->update(['amount' => $amount]);



        $amountTmp = DB::table('deposits')->select('amount')->where('email', $sender)->first()->amount;
        $amount = $amountTmp+$transAmount; 
        
        
        DB::table('deposits')
            ->where('email', $sender)
            ->update(['amount' => $amount]);
    }

}
