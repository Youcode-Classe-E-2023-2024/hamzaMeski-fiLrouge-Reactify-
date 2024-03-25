<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class AQuestionController extends Controller
{
    public function show() {
        $tags = Tag::all();
        return view('QA-page.ask-question-section', compact('tags'));
    }

    public function store() {
        dd(request());
    }
}
