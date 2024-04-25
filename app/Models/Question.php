<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Answer;

class Question extends Model
{
    use HasFactory;

    protected $table = 'questions';

    protected $fillable = [
        'user_id',
        'likes',
        'title',
        'description',
        'image',
    ];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'questions_tags', 'question_id', 'tag_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function blog()
    {
        return $this->hasOne(Blog::class);
    }
}
