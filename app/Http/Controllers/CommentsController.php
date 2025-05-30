<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CommentsController extends Controller
{
    public function addComment(CommentRequest $request)
    {

        Comment::create(array_merge(
            $request->validated(),
            ['user_id' => auth()->id()]
        ));

        return redirect()->route('showPost', $request->post_id)->with('success', 'Comment has been successfully added');

    }
    public function showComment(Post $post, User $user)
    {
        return view('comments.form', compact( 'post', 'user'));
    }


    public function destroyComment($commentId)
    {
        $comment = Comment::findOrFail($commentId);

        if (auth()->id() !== $comment->user_id && !auth()->user()->hasRole('admin')) {
            return redirect()->back()->with('error', 'You do not have permissions to delete this comment');
        }

        $comment->delete();

        return redirect()->back()->with('success', 'Comment has been successfully deleted');
    }

    public function getComments(){

        $comments = auth()->user()->comments()->get();

        return view('comments.show', compact('comments'));
    }



}
