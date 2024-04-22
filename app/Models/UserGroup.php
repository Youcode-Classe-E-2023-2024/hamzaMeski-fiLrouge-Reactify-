<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    use HasFactory;

    protected  $table = 'user_group';

    protected $fillable = [
        'sender_id',
        'receiver_id',
        'group_id',
        'status'
    ];

 public function group()
{
    return $this->belongsTo(ChatGroup::class, 'group_id');
}
}
