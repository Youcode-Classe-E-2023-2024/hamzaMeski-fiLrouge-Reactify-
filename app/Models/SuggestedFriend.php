<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuggestedFriend extends Model
{
    use HasFactory;

    protected $table = 'suggested_friends';

    protected $fillable = [
        'user_id',
        'suggested_id',
        'suggested'
    ];
}
