<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;
class AnswerController extends Controller
{
    public function store(Question $question) {
        $validated = request()->validate([
            'answer' => 'required|min:10',
        ]);

        $validated['question_id'] = $question->id;
        $validated['user_id'] = auth()->id();
        Answer::create($validated);

        return redirect()->back()->with('success', '_');
    }

    public function like_answer(Answer $answer){
        $answer->update([
            'likes' => $answer->likes + 1
        ]);

        // Retrieve the updated value of likes
        $newLikes = $answer->fresh()->likes;

        // Return the new value in the response
        return response()->json(['likes' => $newLikes]);
    }

    public function dislike_answer(Answer $answer){
        $answer->update([
            'likes' => $answer->likes - 1
        ]);

        // Retrieve the updated value of likes
        $newLikes = $answer->fresh()->likes;

        // Return the new value in the response
        return response()->json(['likes' => $newLikes]);
    }

}
