
@extends('layouts.app')

@section('content')




<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="alert alert-success" style="text-align: center;">
                       Your Account Balance is {{ $amount }}
                    </div>

                    <div class="col-md-4">
                    </div>
                    <div class="col-md-2 center-block">
                        <a href="/deposite"> <button type="button" class="btn btn-success">Deposit</button></a>
                    </div>


                    <div class="col-md-2 center-block">
                        <a href="/transfer"> <button type="button" class="btn btn-success">Transfer</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection