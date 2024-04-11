<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Friendship;

class FriendController extends Controller
{
    /* logic */
    public function suggested_users() {
        $auth_user = auth()->user();

        // Retrieve friendships of the authenticated user
        $friendships = Friendship::where('sender_id', auth()->id())->get();

        // retrieve a list of users where their status with the authenticated user is not accepted or neither blocked, along with their relationship status if there is a relationship between them, and the id of that relationship row (if exist) if not set the status none and the id null,
        $users = User::whereNotIn('id', function($query) {
            $query->select('receiver_id')
                ->from('friendships')
                ->where('sender_id', auth()->id())
                ->whereIn('status', ['accepted', 'blocked']);
        })
            ->where('id', '!=', auth()->id())
            ->get();

        // Prepare the response
        $usersWithStatus = [];
        foreach ($users as $user) {
            // Check if there is a relationship between the user and the authenticated user
            $friendship = Friendship::where(function($query) use ($user) {
                $query->where('sender_id', auth()->id())
                    ->where('receiver_id', $user->id);
            })->orWhere(function($query) use ($user) {
                $query->where('sender_id', $user->id)
                    ->where('receiver_id', auth()->id());
            })->first();

            // Determine the status and id of the relationship
            if ($friendship) {
                $status = $friendship->status;
                $id = $friendship->id;
            } else {
                $status = 'none';
                $id = null;
            }

            $usersWithStatus[] = [
                'id' => $user->id,
                'name' => $user->name,
                'image' => $user->image,
                'status' => $status,
                'relationship_id' => $id,
            ];
        }

        return response()->json([
            'friendships' => $friendships,
            'users' => $usersWithStatus,
            'auth_user' => $auth_user
        ]);
    }

    public function add_friend(User $receiver) {
        Friendship::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $receiver->id
        ]);

        return response()->json('friend request added successfully');
    }

    public function cancel_friend_req(User $receiver) {
        Friendship::where('sender_id', auth()->id())
            ->where('receiver_id', $receiver->id)
            ->delete();

        return response()->json('friend request deleted successfully');
    }

    public function remove_friend() {

    }

    public function destroy_friend() {

    }

    public function block_friend() {

    }









    /* blade indexes */
    public  function  friends_home() {
        $users = User::latest()->get();
        return view('friends.home', compact('users'));
    }

    public function suggestions() {
        $users = User::latest()->get();
        return view('friends.suggestions', compact('users'));
    }

    public function all_friends() {
        $users = User::latest()->get();
        return view('friends.all-friends', compact('users'));
    }

    public function friend_requests() {
        $users = User::latest()->get();
        return view('friends.friend-requests', compact('users'));
    }
}
