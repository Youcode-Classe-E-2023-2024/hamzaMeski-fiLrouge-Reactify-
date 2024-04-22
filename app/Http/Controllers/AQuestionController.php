<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Tag;
use App\Models\QuestionTag;
use App\Models\Blog;

class AQuestionController extends Controller
{
    public function show() {
        $tags = Tag::all();
        return view('QA-page.ask-question-section', compact('tags'));
    }

    public function store() {
        $validator = Validator::make(request()->all(), [
            'title' => 'required|min:10',
            'description' => 'required|min:10',
            'tags' => 'required|array|min:1'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $validatedData = $validator->validated(); // Get validated data

        $validatedData['user_id'] = auth()->id();

        $new_question = Question::create($validatedData);


        /*********************/
        // AI based on answer
        $prompt = \request()->title;
        $directory = 'C:\\Users\\Dell\\Desktop\\ChatAPP';

        $command = 'cmd /c "cd '.$directory." && conda activate chatapp && python app.py $prompt";

        exec($command, $output, $returnCode);

        if ($returnCode !== 0) {
            return response()->json([
                'error' => 'Command execution failed',
                'output' => $output
            ]);
        }

        $outputString = implode("\n", $output);
        $outputString = preg_replace('/New.*?####\s*/', '', $outputString);


        Blog::create([
            'question_id' => $new_question->id,
            'title' => \request()->title,
            'content' => $outputString
        ]);
        /********************/

        foreach (request()->tags as $tag_id) {
            QuestionTag::create([
                'question_id' => $new_question->id,
                'tag_id' => $tag_id,
            ]);
        }

        return response()->json([
            'status' => 'question stored successfully'
        ]);
    }
}
