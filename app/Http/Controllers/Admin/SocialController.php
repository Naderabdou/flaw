<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function redirect($service){
        return Socialite::driver($service)->redirect();

    }

    public function callback($service, Request $request){

        $user = Socialite::driver($service)->user();



        $check_login= User::whereEmail($user->getEmail())->first();
        if ($check_login){
            auth()->login($check_login);
            return redirect()->intended(RouteServiceProvider::HOME);

        }
        $new_user= User::create([
                'name'=>$user->name,
                'email'=>$user->email,
                'id'=>$user->id,
                'password'=> $user['id']=Hash::make($user->id)

            ]
        );
        Auth::login($new_user);
        return redirect()->intended(RouteServiceProvider::HOME);



    }
}
