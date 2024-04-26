<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavedAnswer extends Model
{
    use HasFactory;

    protected $table = 'saved_answers';

    protected $fillable = [
        'answer_id',
        'user_id',
    ];

    public function answer()
    {
        return $this->belongsTo(Answer::class, 'answer_id');
    }
}
