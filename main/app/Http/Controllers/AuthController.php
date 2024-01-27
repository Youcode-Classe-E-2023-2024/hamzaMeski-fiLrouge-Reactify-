<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class AuthController extends Controller
{
    public function register() {
        return view('auth.register');
    }

    public function store() {

    }

    public function login() {
        return view('auth.login');
    }

    public function authentificate(User $user) {

    }

    public function logout() {

    }
}
