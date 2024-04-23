<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blog';

    protected $fillable = [
        'question_id',
        'title',
        'content',
        'likes'
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
