<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use function Laravel\Prompts\password;

class AuthController extends Controller
{
    public function register() {
        return view('auth.register');
    }

    public function store() {
        $validated = request()->validate([
            'name' => 'required|min:5|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bio' => 'required|min:5|max:200'
        ]);

        $validated['password'] = bcrypt($validated['password']);

        if(request()->hasFile('image')) {
            $imagePath = request()->file('image')->store('images', 'public');
            $validated['image'] = $imagePath;
        }
        User::create($validated);

        return redirect()->route('main');
    }

    public function login() {
        return view('auth.login');
    }

    public function authentificate(User $user) {

    }

    public function logout() {

    }
}
