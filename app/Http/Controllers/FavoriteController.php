<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;

class FavoriteController extends Controller
{
    public function addFav($postId)
    {
        $user = Auth::user();

        $user->favorites()->attach($postId);

        return redirect()->back()->with('success', 'Post has been successfully added');
    }
    public function showFav()
    {
        $posts = auth()->user()->favorites()->get();

        return view('layouts.fav', compact('posts'));
    }
    public function removeFav($postId)
    {
        $user = Auth::user();

        $user->favorites()->detach($postId);

        return back();
    }
}
