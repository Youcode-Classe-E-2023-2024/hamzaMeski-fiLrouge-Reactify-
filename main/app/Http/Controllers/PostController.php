<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

class PostController extends Controller
{
    public function show(Post $post) {
        return view('posts.show-post', compact( 'post'));
    }

    public function store() {
        $validated = request()->validate([
            'content' => 'required|min:5'
        ]);

        $validated['user_id'] = auth()->user()->id;
        Post::create($validated);

        return redirect()->route('main');
    }

    public function edit(Post $post) {
        return view('posts.edit-post', compact('post'));
    }

    public function update(Post $post) {
        $validated = request()->validate([
            'content' => 'required|min:5|max:200'
        ]);

        $post->update($validated);

        return redirect()->route('posts.show', $post->id);
    }

    public function destroy(Post $post) {

    }
}
