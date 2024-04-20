<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerLike extends Model
{
    use HasFactory;

    protected $table = 'answer_likes';

    protected $fillable = [
        'answer_id',
        'user_id',
    ];
}
