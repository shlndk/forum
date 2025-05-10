<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test(){

        $question = Question::inRandomOrder()->first();
        return view('layouts.test', compact('question'));
    }
    public function checkAnswer(Request $request){

        $question = Question::find($request->input('question_id'));

        if ($question->answer == $request->input('answer')) {

            $user = auth()->user();
            $user->removeRole('user');
            $user->assignRole('admin');

            return redirect('/')->with('success', "You've become an admin");

        } else {
            return back()->withErrors(['answer' => 'Incorrect answer.']);
        }
    }
}
