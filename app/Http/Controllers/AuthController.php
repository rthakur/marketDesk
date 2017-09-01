<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use App\SocialDetail;
use Auth;

class AuthController extends Controller
{
    public function redirectToProvider($provider)
    {
       return Socialite::driver($provider)->redirect();
    }
    public function handleProviderCallback($provider)
    {
       $socialuser = Socialite::driver($provider)->user();


       $new_user=User::where('email',$socialuser->getemail())->first();
       if (!$new_user)
       {
         $data = [
             'email' => $socialuser->getEmail(),
             'name' => $socialuser->getName(),
             
             'password'=>''
         ];
         $new_user=User::firstOrCreate($data);
       }
       Auth::login($new_user);
       return redirect('/');

    }
}
