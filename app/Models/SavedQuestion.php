<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavedQuestion extends Model
{
    use HasFactory;

    protected $table = 'saved_questions';

    protected $fillable = [
        'question_id',
        'user_id',
    ];
}
