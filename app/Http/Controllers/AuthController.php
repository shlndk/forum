<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registerForm(){
        return view('auth.register');
    }
    public function register(Request $request){
        $auth = $request->validate([
            'name' => 'required|min:6',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|min:6'
        ]);


        User::create($auth);


        $user = User::create($auth);
        $user->assignRole('user');


        return redirect(route('home'))->with('success', 'User created successfully');
    }

    public function loginForm(){
        return view('auth.login');
    }

    public function login(Request $request){
        $auth = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|min:6'
        ]);

        if(Auth::attempt($auth)){
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
