<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlockFriend extends Model
{
    use HasFactory;

    protected $table = 'block_friend';

    protected $fillable = [
        'friendship_id',
        'blocked_by_id',
        'blocked_user_id'
    ];
}
