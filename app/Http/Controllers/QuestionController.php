<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Question;
use App\Models\Answer;
use App\Models\QuestionLike;
use App\Models\SavedQuestion;


class QuestionController extends Controller
{
    public function like_question(Question $question){
        $questionId =  $question->id;
        $userId = auth()->id();
        $likedRow = QuestionLike::where('question_id', $questionId)->where('user_id', $userId);
        $checkLike = $likedRow->exists();
        if(!$checkLike) {
            $question->update([
                'likes' => $question->likes + 1
            ]);
            QuestionLike::create([
                'user_id' => $userId,
                'question_id' => $questionId
            ]);
        }else {
            $question->update([
                'likes' => $question->likes - 1
            ]);
            $likedRow->delete();
        }

        // Retrieve the updated value of likes
        $newLikes = $question->fresh()->likes;

        // Return the new value in the response
        return response()->json([
            'likes' => $newLikes
        ]);
    }

    public function save_question(Question $question) {
        $questionId = $question->id;
        $userId = auth()->id();
        $savedRow = SavedQuestion::where('question_id', $questionId)->where('user_id', $userId)->first(); // Retrieve the first matching saved question
        if(!$savedRow) { // If no saved question exists
            SavedQuestion::create([
                'user_id' => $userId,
                'question_id' => $questionId
            ]);
            return response()->json([
                'status' => 'saved'
            ]);
        } else { // If a saved question exists
            $savedRow->delete(); // Delete the saved question
            return response()->json([
                'status' => 'unsaved'
            ]);
        }
    }


    public function get_question_answers(Question $question) {
        $answers = Answer::where('question_id', $question->id)
            ->with('user')
            ->latest()
            ->get();
        return response()->json($answers);
    }

    public function answer_question(Question $question) {
        $validator = Validator::make(request()->all(), [
            'answer' => 'required|min:10',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $validatedData = $validator->validated(); // Get validated data

        $validatedData['question_id'] = $question->id;
        $validatedData['user_id'] = auth()->id();

        Answer::create($validatedData);

        return response()->json([
            'message' => 'Answer stored successfully'
        ]);
    }

    public function update_answer(Answer $answer) {
        if($answer->user_id == auth()->id()) {
            $validator = Validator::make(request()->all(), [
                'answer' => 'required|min:10',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $data = $validator->validated();

            $answer->update($data);

            return response()->json([
                'message' => 'Answer updated successfully'
            ]);
        }

        return response()->json([
            'message' => 'unauthorized user'
        ]);
    }


    public function delete_answer(Answer $answer) {
        try {
            if($answer->user_id == auth()->id()) {
                $answer->delete();
                return response()->json([
                    'success' => 'Answer deleted successfully'
                ], 200);
            }
            return response()->json([
                'message' => 'unauthorized user'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
