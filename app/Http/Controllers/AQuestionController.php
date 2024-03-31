<?php

namespace App\Http\Controllers;

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

        /*********************/
        // AI based on answer
        $prompt = \request()->title;
        $directory = 'C:\\Users\\Dell\\Desktop\\ChatAPP';

        $command = 'cmd /c "cd '.$directory." && conda activate chatapp && python app.py $prompt";

        exec($command, $output, $returnCode);

        if ($returnCode !== 0) {
            return [
                'error' => 'Command execution failed',
                'output' => $output
            ];
        }

        $outputString = implode("\n", $output);
        // Remove leading and trailing whitespace
        $outputString = trim($outputString);

        // Replace consecutive newlines with a single newline
        $outputString = preg_replace('/\n+/', "\n", $outputString);

        // Convert multiple spaces into a single space
        $outputString = preg_replace('/\s+/', ' ', $outputString);

        // Remove excessive whitespace around punctuation marks
        $outputString = preg_replace('/\s*([.,!?])\s*/', '$1 ', $outputString);

        // Add line breaks after sentences
        $outputString = preg_replace('/(?<!\w\.\w.)(?<![A-Z][a-z]\.)(?<=\.|\?)\s/', "\n", $outputString);

        // Remove excessive blank lines
        $outputString = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $outputString);

        // Remove any remaining consecutive spaces
        $outputString = preg_replace('/\s+/', ' ', $outputString);
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

        return redirect()->route('ask-question.show')->with('success', '_');
    }
}
