<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Tag;
use App\Models\QuestionTag;

class AQuestionController extends Controller
{
    public function show() {
        $tags = Tag::all();
        return view('QA-page.ask-question-section', compact('tags'));
    }

    public function store() {
        $validated = request()->validate([
            'title' => 'required|min:10',
            'description' => 'required|min:10',
            'tags' => 'required|array|min:1'
        ]);

        $validated['user_id'] = auth()->id();

        if(request()->hasFile('image')) {
            $imagePath = request()->file('image')->store('images', 'public');
            $validated['image'] = $imagePath;
        }

        $new_question = Question::create($validated);

        foreach (request()->tags as $tag_id) {
            QuestionTag::create([
                'question_id' => $new_question->id,
                'tag_id' => $tag_id,
            ]);
        }

        return redirect()->route('ask-question.show');
    }
}
