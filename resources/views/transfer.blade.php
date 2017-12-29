
@extends('layouts.app')

@section('content')
<form class="form-horizontal" method="POST" action="http://127.0.0.1:8000/transfer">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('transfer') ? ' has-error' : '' }}">
                            <label for="transfer" class="col-md-4 control-label">Amount  </label>

                            <div class="col-md-6">
                                <input id="transfer" type="text" class="form-control" name="amount" value="{{ old('transfer') }}" >

                                @if ($errors->has('transfer'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('transfer') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('receiver') ? ' has-error' : '' }}">
                            <label for="transfer" class="col-md-4 control-label">Receiver  </label>

                            <div class="col-md-6">
                                <input id="receiver" type="email" class="form-control" name="receiver" value="{{ old('receiver') }}" >

                                @if ($errors->has('receiver'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('receiver') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Deposit
                                </button>

                               
                            </div>
                        </div>
                    </form>
@endsection