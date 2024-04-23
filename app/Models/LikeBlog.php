<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeBlog extends Model
{
    use HasFactory;

    protected $table = 'like_blog';

    protected $fillable = [
        'user_id',
        'blog_id',
    ];
}
