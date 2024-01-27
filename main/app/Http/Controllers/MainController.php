<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

class MainController extends Controller
{
    public function index() {
        $posts = Post::latest();

        if(request()->has('search')) {
            $posts = $posts->where('content', 'like', '%' . request()->get('search','') . '%');
        }

        $posts = $posts->paginate(5);
        return view('main', compact('posts'));
    }
}
