<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Support\Facades\Storage;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
        'bio'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getImageURL() {
        if (Storage::exists('public/images/MLk5koUziGSggwC6k9tEW9bGRahiRNCF8L4gMzfG.jpg')) {
//            dd();
        } else {
            // File doesn't exist
//            dd();
        }

//        dd(url('storage/' . $this->image));
        if($this->image) {
            return url('storage/' . $this->image);
        }
//        return "https://api.dicebear.com/6.x/fun-emoji/svg?seed={$this->name}";
    }
}
