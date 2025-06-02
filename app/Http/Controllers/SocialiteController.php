<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;


class SocialiteController
{
    public function googleLogin(){
        return Socialite::driver('google')->redirect();
    }
    public function googleAuthentication(){
        $googleUser = Socialite::driver('google')->user();

        $user = User::updateOrCreate([
            'google_id' => $googleUser->id,
        ], [
            'name' => $googleUser->name,
            'email' => $googleUser->email,
            'password' => bcrypt(Str::random(16)),
            'google_token' => $googleUser->token,
            'google_refresh_token' => $googleUser->refreshToken,
        ]);
        if($user->hasRole('admin')){
            Auth::login($user);
            return redirect()->route('home')->with('success', 'You have successfully logged!');
        }

        $user->assignRole('user');
        Auth::login($user);

        return redirect()->route('home')->with('success', 'You have successfully logged!');
    }


}
