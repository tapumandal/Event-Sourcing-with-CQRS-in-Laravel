
@extends('layouts.app')

@section('content')




<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    

                   @foreach ($histories as $history)
                     <p>Command: {{ $history->command }} <br> Data: {{ $history->event }} </p>
                        
                        <?php
                            $jsonData = json_decode($history->event);
                        ?>

                        @if($history->command == "CREDIT_TRANSFER")
                        <form class="form-horizontal" method="POST" action="http://127.0.0.1:8000/stoptransection">
                            {{ csrf_field() }}

                            <div class="">
                                <div class="col-md-6">
                                    <input id="deposite" type="hidden" class="form-control" name="stopid" value="{{ $history->id }}" >
                                </div>
                            </div>

                            <div class="">
                                <div class="col-md-6">
                                    <input id="deposite" type="hidden" class="form-control" name="sender" value="{{ $jsonData->sender }}" >
                                </div>
                            </div>

                            <div class="">
                                <div class="col-md-6">
                                    <input id="deposite" type="hidden" class="form-control" name="receiver" value="{{ $jsonData->receiver }}" >
                                </div>
                            </div>

                            <div class="">
                                <div class="col-md-6">
                                    <input id="deposite" type="hidden" class="form-control" name="amount" value="{{ $jsonData->amount }}" >
                                </div>
                            </div>

                           

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-danger">
                                        STOP
                                    </button>

                                   
                                </div>
                            </div>
                        </form>
                        @endif
                        <hr>
                    @endforeach


                </div>
            </div>
        </div>
    </div>
</div>



@endsection