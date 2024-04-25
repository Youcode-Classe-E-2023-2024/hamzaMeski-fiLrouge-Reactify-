<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Tag;
use App\Models\QuestionTag;
use App\Models\Answer;
use App\Models\Blog;

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


        $mostLikedBlogs = Blog::orderBy('likes', 'desc')
            ->take(3)
            ->get();
        return view('QA-page.Q-items', compact('questions', 'mostLikedBlogs'));
    }

    public function top_questions() {
        $questions = Question::withCount('answers')
            ->with('tags')
            ->orderBy('likes', 'desc')
            ->latest()
            ->get();

        return view('top-questions.main', compact('questions'));
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
            $query->where('tags.id', $tag->id); // Specify the table name for the id column
        })->get();

        return view('tags-questions.main', compact('questions'));
    }
}
