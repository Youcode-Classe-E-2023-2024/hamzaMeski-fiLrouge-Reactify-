<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\LikeBlog;

class BlogController extends Controller
{
    public function main() {
        $articles = Blog::latest()->get();
        return view('blog.main', compact('articles'));
    }

    public function article_details(Blog $article) {
        return view('blog.article-details', compact('article'));
    }

    public function like_blog(Blog $blog) {
        $blogId = $blog->id;
        $userId = auth()->id();
        $likedRow = LikeBlog::where('blog_id', $blogId)->where('user_id', $userId);
        $checkLike = $likedRow->exists();

        if(!$checkLike) {
            $blog->update([
                'likes' => $blog->likes + 1
            ]);
            LikeBlog::create([
                'user_id' => $userId,
                'blog_id' => $blogId
            ]);
            $liked = true;
        }else{
            $blog->update([
                'likes' => $blog->likes - 1
            ]);
            $likedRow->delete();
            $liked = false;
        }

        // Retrieve the updated value of likes
        $newLikes = $blog->fresh()->likes;

        // Return the new value in the response
        return response()->json([
            'likes' => $newLikes,
            'liked' => $liked
        ]);
    }

    public function is_blog_liked(Blog $blog) {
        $blogId = $blog->id;
        $userId = auth()->id();
        $likedRow = LikeBlog::where('blog_id', $blogId)->where('user_id', $userId);
        $checkLike = $likedRow->exists();

        if(!$checkLike) {
            $liked = false;
        } else {
            $liked = true;
        }

        // Return the new value in the response
        return response()->json([
            'liked' => $liked
        ]);
    }

    public function are_blogs_liked() {
        $userId = auth()->id();
        $blogs = \request()->blogs;

        $likedBlogs = [];
        foreach ($blogs as $blogId) {
            $likedRow = LikeBlog::where('blog_id', $blogId)->where('user_id', $userId);
            $checkLike = $likedRow->exists();

            if(!$checkLike) {
                $liked = false;
            } else {
                $liked = true;
            }

            $likedBlogs[] = [
                'blog_id' => $blogId,
                'liked'   => $liked,
                'likes' => Blog::where('id', $blogId)->value('likes')
            ];
        }

        return response()->json($likedBlogs);
    }
}
