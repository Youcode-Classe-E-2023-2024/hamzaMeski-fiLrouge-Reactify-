<?php

namespace App\Http\Controllers;

use App\Models\SavedAnswer;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Tag;
use App\Models\User;
use App\Models\Answer;
use App\Models\Blog;
use App\Models\SavedQuestion;

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
//        $questions = Question::withCount('answers')
//            ->with('tags')
//            ->orderBy('likes', 'desc') // Order by the 'likes' column in descending order
//            ->latest() // If there are ties in likes, order by the latest
//            ->get();


        $hover = 'Home';
        $mostLikedBlogs = Blog::orderBy('likes', 'desc')
            ->take(3)
            ->get();
        return view('QA-page.Q-items', compact('questions', 'mostLikedBlogs', 'hover'));
    }

    public function top_questions() {
        $questions = Question::withCount('answers')
            ->with('tags')
            ->orderBy('likes', 'desc')
            ->latest()
            ->get();

        $hover = 'Top questions';

        return view('top-questions.main', compact('questions', 'hover'));
    }

    public function Q_item_details(Question $question) {
        $question = $question->loadCount('answers');
        $answers = Answer::where('question_id', $question->id)->latest()->get();
        return view('QA-page.Q-item-details', compact('question', 'answers'));
    }

    public function get_tags() {
        $tags = Tag::all();
        return view('tags.main', compact('tags'));
    }

    public function tags_questions($id) {
        $tag = Tag::findOrFail($id);
        $questions = Question::whereHas('tags', function ($query) use ($tag) {
            $query->where('tags.id', $tag->id);
        })->get();

        return view('tags-questions.main', compact('questions'));
    }

    public function saved_questions() {
        $user = User::findOrFail(auth()->id());

        $savedQuestions = SavedQuestion::where('user_id', $user->id)->with('question')->get();
        return view('saved-questions.main', compact('savedQuestions'));
    }

    public function saved_answers_index() {
        $user = User::findOrFail(auth()->id());

        $savedAnswers = SavedAnswer::where('user_id', $user->id)->with('answer')->get();
        return view('saved-answers.main', compact('savedAnswers'));
    }
}
