<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AQuestionController extends Controller
{
    public function show() {
        return view('QA-page.ask-question-section');
    }

    public function store() {

    }
}
