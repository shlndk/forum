<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('layouts.home', compact('user'));
    }
    public function createPostForm()
    {
        return view('layouts.createPost');
    }
    public function createPost(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:6',
            'content' => 'required|min:15'
        ]);

        $validatedData['username'] = Auth::user()->name;

        Post::create($validatedData);

        return redirect()->route('home')->with('success', 'Post created successfully');
    }

}
