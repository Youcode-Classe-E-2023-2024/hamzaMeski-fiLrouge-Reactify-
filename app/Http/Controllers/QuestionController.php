<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{
    public function like_question(Question $question){
        $question->update([
            'likes' => $question->likes + 1
        ]);

        // Retrieve the updated value of likes
        $newLikes = $question->fresh()->likes;

        // Return the new value in the response
        return response()->json(['likes' => $newLikes]);
    }

    public function dislike_question(Question $question){
        $question->update([
            'likes' => $question->likes - 1
        ]);

        // Retrieve the updated value of likes
        $newLikes = $question->fresh()->likes;

        // Return the new value in the response
        return response()->json(['likes' => $newLikes]);
    }

}
