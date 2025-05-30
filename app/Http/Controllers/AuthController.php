<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registerForm(){

        return view('auth.register');
    }
    public function register(RegisterRequest $request){


        $user = User::create($request->validated());

        $user->assignRole('user');

        return redirect(route('home'))->with('success', 'You have successfully registered to continue please login');
    }

    public function loginForm(){

        return view('auth.login');
    }

    public function login(LoginRequest $request){


        if(Auth::attempt($request->validated())){
            return redirect('/');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials'
        ]);
    }

    public function logout(){

        Auth::logout();

        return redirect('/')->with('success', 'Logged out successfully');
    }

}
