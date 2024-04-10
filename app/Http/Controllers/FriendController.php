<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class FriendController extends Controller
{
    public  function  friends_home() {
        $users = User::latest()->get();
        return view('friends.home', compact('users'));
    }
}
