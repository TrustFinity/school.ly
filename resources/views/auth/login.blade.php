@extends('layouts.auth')

@section('content')

{{-- <div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <form class="form" role="form" method="POST" action="{{ route('login') }}">
                <div class="panel panel-default">
                    <div class="panel-body">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <div class="col-xs-10 col-xs-offset-1">
                                <label for="username" class="control-label">Username</label>
                                <input id="username" type="text" class="form-control" name="username"
                                       value="{{ old('username') }}" required autofocus
                                placeholder="mwakaambrose">
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
                    </div>
                    <div class="panel-footer">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-10 col-xs-offset-1">
                                    <button type="submit" class="btn btn-success form-control">
                                        Login to {{ config('app.name', 'Darasani') }}
                                    </button>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <span class="small">
                                        Powered by <a href="http://trustfinity.tech">TrustFinity</a> &amp <a
                                                href="http://ambrose.pro">ambrose.pro</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div> --}}

    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

            <div class="col-md-8">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-md-4 control-label">Password</label>

            <div class="col-md-8">
                <input id="password" type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                    </label>
>>>>>>> starts modifying ui
                </div>
            </form>
        </div>

        <div class="form-group">
            <div class="col-md-8 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    Login
                </button>

                <a class="btn btn-link" href="{{ route('password.request') }}">
                    Forgot Your Password?
                </a>
            </div>
        </div>
    </form>

@endsection
