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
}
