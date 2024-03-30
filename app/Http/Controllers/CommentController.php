<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Comment;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function store(Answer $answer) {

        $validator = Validator::make(request()->all(), [
            'comment' => 'required|min:10',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $commentData = [
            'comment' => request()->input('comment'),
            'user_id' => auth()->id(),
            'answer_id' => $answer->id,
        ];

        if (request()->has('parent_id')) {
            $commentData['parent_id'] = request()->input('parent_id');
        }

        Comment::create($commentData);

        $comments = Comment::where('answer_id', $answer->id)->latest()->get();

        return response()->json(['success' => true, 'comments' => $comments->load('user')]);
    }

    public function update(Comment $comment) {
        $validator = Validator::make(request()->all(), [
            'comment' => 'required|min:10',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $commentData = [
            'comment' => request()->input('comment'),
        ];

        $comment->update($commentData);

        $comments = Comment::where('answer_id', $comment->answer_id)->latest()->get();

        return response()->json(['success' => true, 'comments' => $comments->load('user')]);
    }

    public function get_comments(Answer $answer) {
        $comments = Comment::where('answer_id', $answer->id)->latest()->get();

        return response()->json(['success' => true, 'comments' => $comments->load('user')]);
    }
}
