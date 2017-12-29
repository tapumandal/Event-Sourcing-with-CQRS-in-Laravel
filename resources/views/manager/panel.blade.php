
@extends('layouts.app')

@section('content')




<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    

                   

                    <div class="col-md-3">
                    </div>
                    <div class="col-md-2 center-block">
                        <a href="/accountslist"> <button type="button" class="btn btn-success">Accounts</button></a>
                    </div>


                    <!-- <div class="col-md-2 center-block">
                        <a href="/transfer"> <button type="button" class="btn btn-success">Deposit</button></a>
                    </div> -->

                    <div class="col-md-2 center-block">
                        <a href="/history"> <button type="button" class="btn btn-success">History</button></a>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>



@endsection