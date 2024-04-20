<?php

namespace App\Http\Controllers;
use App\Models\Answer;
use App\Models\AnswerLike;
use App\Models\SavedAnswer;


class AnswerController extends Controller
{
    public function like_answer(Answer $answer){
        $answerId =  $answer->id;
        $userId = auth()->id();
        $likedRow = AnswerLike::where('answer_id', $answerId)->where('user_id', $userId);
        $checkLike = $likedRow->exists();
        if(!$checkLike) {
            $answer->update([
                'likes' => $answer->likes + 1
            ]);
            AnswerLike::create([
                'user_id' => $userId,
                'answer_id' => $answerId
            ]);
        } else {
            $answer->update([
                'likes' => $answer->likes - 1
            ]);
            $likedRow->delete();
        }

        // Retrieve the updated value of likes
        $newLikes = $answer->fresh()->likes;

        // Return the new value in the response
        return response()->json([
            'likes' => $newLikes
        ]);
    }


    public function save_answer(Answer $answer) {
        $answerId = $answer->id;
        $userId = auth()->id();
        $savedRow = SavedAnswer::where('answer_id', $answerId)->where('user_id', $userId)->first(); // Retrieve the first matching saved answer
        if (!$savedRow) { // If no saved answer exists
            SavedAnswer::create([
                'user_id' => $userId,
                'answer_id' => $answerId
            ]);
            return response()->json([
                'status' => 'saved'
            ]);
        } else { // If a saved answer exists
            $savedRow->delete(); // Delete the saved answer
            return response()->json([
                'status' => 'unsaved'
            ]);
        }
    }
}
