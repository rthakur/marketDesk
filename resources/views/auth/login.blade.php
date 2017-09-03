


@extends('layouts.auth')

@section('content')

<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div>
        </div>
        <h3>Stock Desk</h3>
        <form class="m-t" role="form" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                 <input id="email" type="email" class="form-control" placeholder="Username" name="email" value="{{ old('email') }}" required autofocus>
                   @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input id="password" type="password" class="form-control" name="password" required placeholder="Password">
                      @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
            <a href="{{ route('password.request') }}"><small>Forgot password?</small></a>
            <p class="text-muted text-center"><small>Do not have an account?</small></p>
            <a class="btn btn-sm btn-white btn-block" href="{{ route('register') }}">Create an account</a>
        </form>
    </div>
</div>

@endsection
