<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function searchForm(Request $request)
    {

        $search = trim($request->input('search'));

        $posts = collect();

        if ($search) {
            $posts = Post::where('title', 'like', '%' . $search . '%')->get();
        }



        return view('layouts.search', compact('posts','search'));

    }

    public function showPost(Post $post)
    {
        if (!$post) {
            abort(404);
        }

        return view('post.show', compact('post'));
    }


}
