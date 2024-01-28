<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    public function profile(User $user) {
        return view('users.show-profile', compact('user'));
    }

    public function update(User $user) {

    }
}
