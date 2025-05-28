<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;

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

    public function createPost(PostRequest $request)
    {


        $validatedData['username'] = Auth::user()->name;

        Post::create(
            array_merge(
                $request->validated(),
                $validatedData
            )
        );

        return redirect()->route('home')->with('success', 'Post created successfully');
    }



}
