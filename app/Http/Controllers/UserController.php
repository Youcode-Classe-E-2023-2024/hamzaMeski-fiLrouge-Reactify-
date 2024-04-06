<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // here we mean by top users the user that have the most answers rate (likes and number of answers)
    public function get_top_users() {
        $users = User::all();

        return view('QA-page.top-users', compact('users'));
    }

    public function get_top_user_details(User $user) {
        return view('QA-page.top-user-details', compact('user'));
    }
}
