<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    public function profile(User $user) {
        return view('users.show-profile', compact('user'));
    }

    public function edit(User $user) {
        $editing = true;
        return view('users.show-profile', compact('user', 'editing'));
    }

    public function update(User $user) {
        $validated = request()->validate([
            'name' => 'required|min:5|max:50',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bio' => 'required|min:5|max:200'
        ]);

        if(request()->hasFile('image')) {
            $imagePath = request()->file('image')->store('images', 'public');
            $validated['image'] = $imagePath;

//            Storage::disk('images')->delete($user->image);
        }

        $user->update($validated);

        return redirect()->route('profile', $user->id);
    }
}
