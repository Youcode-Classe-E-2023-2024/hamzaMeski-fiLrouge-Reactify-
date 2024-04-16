<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // here we mean by top users the user that have the most answers rate (likes and number of answers)
    public function get_top_users() {
        $users = User::all();

        return view('top-users.main', compact('users'));
    }

    public function get_top_user_details(User $user) {
        return view('QA-page.top-user-details', compact('user'));
    }


    // get the authenticated user
    public function get_logged_user() {
        return response()->json(auth()->user());
    }

    // get a certain user based on its id
    public function get_user(User $user) {
        $userData = User::where('id', $user->id)->first();
        return response()->json($userData);
    }
}
