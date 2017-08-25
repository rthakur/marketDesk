


@extends('layouts.auth')
@section('content')

<div class="middle-box text-center loginscreen   animated fadeInDown">
     <div>
         
         <h3>Register to IN+</h3>
         <p>Create account to see it in action.</p>
         <form class="m-t" method="POST" action="{{ route('register') }}">
             {{ csrf_field() }}
           <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                     <input id="name" type="text" placeholder="Name" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                   @if ($errors->has('name'))
                       <span class="help-block">
                           <strong>{{ $errors->first('name') }}</strong>
                       </span>
                   @endif
             </div>
             <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <input id="email" type="email" class="form-control"  placeholder="Email" name="email" value="{{ old('email') }}" required>
                 @if ($errors->has('email'))
                     <span class="help-block">
                         <strong>{{ $errors->first('email') }}</strong>
                     </span>
                 @endif
             </div>
             <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                   <input id="password" type="password" class="form-control"  placeholder="Password" name="password" required>
                   @if ($errors->has('password'))
                       <span class="help-block">
                           <strong>{{ $errors->first('password') }}</strong>
                       </span>
                   @endif
                 </div>
              <div class="form-group">
                  <input id="password-confirm" type="password" class="form-control" placeholder='confirm-password' name="password_confirmation" required>
                </div>
             <div class="form-group">
                 <div class="checkbox i-checks"><label> <input type="checkbox"><i></i> Agree the terms and policy </label></div>
             </div>
             <button type="submit" class="btn btn-primary block full-width m-b">Register</button>
             <p class="text-muted text-center"><small>Already have an account?</small></p>
             <a class="btn btn-sm btn-white btn-block" href="{{ route('login') }}">Login</a>
         </form>
         <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>
     </div>
 </div>
@endsection
