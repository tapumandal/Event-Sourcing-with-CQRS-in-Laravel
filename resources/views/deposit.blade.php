
@extends('layouts.app')

@section('content')
                    <form class="form-horizontal" method="POST" action="http://127.0.0.1:8000/deposite">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('deposite') ? ' has-error' : '' }}">
                            <label for="deposite" class="col-md-4 control-label">Deposit  </label>

                            <div class="col-md-6">
                                <input id="deposite" type="text" class="form-control" name="amount" value="{{ old('deposite') }}" >

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
                                    Deposit
                                </button>

                               
                            </div>
                        </div>
                    </form>
@endsection