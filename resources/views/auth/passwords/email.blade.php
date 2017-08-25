
@extends('layouts.auth')
@section('content')
    <div class="passwordBox animated fadeInDown">
        <div class="row">
            <div class="col-md-12">
                <div class="ibox-content">
                    <h2 class="font-bold">Forgot password</h2>
                    <p>
                        Enter your email address and your password will be reset and emailed to you.
                    </p>
                    <div class="row">
                        <div class="col-lg-12">
                          @if (session('status'))
                              <div class="alert alert-success">
                                  {{ session('status') }}
                              </div>
                          @endif
                          <form class="m-t" method="POST" action="{{ route('password.email') }}">
                              {{ csrf_field() }}
                                <div class="form-group">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary block full-width m-b">Send new password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6">
                Copyright Example Company
            </div>
            <div class="col-md-6 text-right">
               <small>© 2014-2015</small>
            </div>
        </div>
    </div>
@endsection
