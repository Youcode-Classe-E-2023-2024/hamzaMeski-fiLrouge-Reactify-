<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function friends_index() {
        return view('friends.main');
    }

    public  function  friends_home() {
        return view('friends.home');
    }
}
