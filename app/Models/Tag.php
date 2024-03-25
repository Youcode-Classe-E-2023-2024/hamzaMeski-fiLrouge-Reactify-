<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'tags';

    protected $fillable = [
        'name',
    ];

    public function questions()
    {
        return $this->belongsToMany(Question::class, 'questions_tags', 'tag_id', 'question_id');
    }
}
