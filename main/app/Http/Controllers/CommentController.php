<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    public function store(Post $post) {
        if(!auth()->user()) {
            return redirect()->route('login');
        }

        $validated = request()->validate([
            'content' => 'required|min:5|max:200',
        ]);
        $validated['user_id'] = auth()->id();
        $validated['post_id'] = $post->id;
        Comment::create($validated);

        return redirect()->route('posts.show', $post->id);
    }
}
