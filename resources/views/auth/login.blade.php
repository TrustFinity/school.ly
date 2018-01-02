@extends('layouts.auth')

@section('content')

    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
            <div class="col-xs-10 col-xs-offset-1">
                <label for="username" class="control-label">Username</label>
                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus
                    placeholder="username">
                @if ($errors->has('username'))
                    <span class="help-block">
                        <p>{{ $errors->first('username') }}</p>
                    </span>
                @endif
            </div>
        </div>


        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <div class="col-xs-10 col-xs-offset-1">
                <label for="password" class="control-label">Password</label>
                <input id="password" type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <p>{{ $errors->first('password') }}</p>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-xs-10 col-xs-offset-1">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-xs-10 col-xs-offset-1">
                    <button type="submit" class="btn btn-success form-control">
                        Login to {{ config('app.name', 'Darasani') }}
                    </button>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span class="small">
                        Powered by <a href="http://trustfinity.tech">TrustFinity</a> &amp
                        <a href="http://ambrose.pro">ambrose.pro</a>
                    </span>
                </div>
            </div>
        </div>
    </form>

@endsection
