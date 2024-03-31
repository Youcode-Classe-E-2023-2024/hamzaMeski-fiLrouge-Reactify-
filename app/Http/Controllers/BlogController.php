<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function main() {
        $articles = Blog::latest()->get();
        return view('blog.main', compact('articles'));
    }
}
