<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Tag;
use App\Models\QuestionTag;
use App\Models\Answer;

class HomeController extends Controller
{
    public function Q_items() {
        /*
        $questions = Question::withCount('answers')->get();
        +
        $questions = Question::with('tags')->get();
        =
        */
        $questions = Question::withCount('answers')
            ->with('tags')
            ->latest()
            ->get();
        return view('QA-page.Q-items', compact('questions'));
    }

    public function Q_item_details(Question $question) {
        $question = $question->loadCount('answers');
        $answers = Answer::where('question_id', $question->id)->latest()->get();
        return view('QA-page.Q-item-details', compact('question', 'answers'));
    }
}
