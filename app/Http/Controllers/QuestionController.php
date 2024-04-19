<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;
use Illuminate\Support\Facades\Validator;

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
        echo  request()->answer;
//        Answer::where('id', $answer->id)->update([
//            'answer' => $answer->answer
//        ]);
//
//        return response()->json([
//            'message' => 'Answer updated successfully'
//        ]);
    }


    public function delete_answer(Answer $answer) {
        try {
            $answer->delete();
            return response()->json([
                'success' => 'Answer deleted successfully'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

}
