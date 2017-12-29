
@extends('layouts.app')

@section('content')




<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    

                   @foreach ($accounts as $account)
                     <p>Account: {{ $account->email }} Blance: {{ $account->amount }}

                     <form class="form-horizontal" method="POST" action="http://127.0.0.1:8000/delete">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('deposite') ? ' has-error' : '' }}">
                            
                            <div class="col-md-6">
                                <input id="deposite" type="hidden" class="form-control" name="account" value="{{ $account->email }}" >

                                @if ($errors->has('deposite'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('deposite') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Delete
                                </button>

                               
                            </div>
                        </div>
                    </form>


                     </p>
                    @endforeach


                </div>
            </div>
        </div>
    </div>
</div>



@endsection