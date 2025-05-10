<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function showPost(Post $post)
    {
        if (!$post) {
            abort(404);
        }

        return view('post.show', compact('post'));
    }
    public function createPostForm()
    {
        return view('layouts.createPost');
    }

    public function searchForm(Request $request)
    {
        $search = trim($request->input('search'));

        $posts = collect();

        if ($search) {
            $posts = Post::where('title', 'like', '%' . $search . '%')->get();
        }

        return view('layouts.search', compact('posts','search'));

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
