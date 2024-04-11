<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Friendship;
use App\Models\SuggestedFriend;

class FriendController extends Controller
{
    /* logic */
    public function suggested_users() {
        $authUserId = auth()->id();

        // Retrieve friendships of the authenticated user
        $friendships = Friendship::where('sender_id', $authUserId)->get();

        // Check if auth user ID exists in the suggested_friends table
        $excludedUserIds = [];
        $hasAuthUserSuggested = SuggestedFriend::where('user_id', $authUserId)->exists();
        if ($hasAuthUserSuggested) {
            // Retrieve IDs of users in the suggested_friends table where suggested = 'false' and user_id = auth user's ID
            $excludedUserIds = SuggestedFriend::where('user_id', $authUserId)
                ->where('suggested', 'false')
                ->pluck('suggested_id');
        }

        // Retrieve users excluding the excludedUserIds
        $users = User::whereNotIn('id', function($query) use ($authUserId, $excludedUserIds) {
            $query->select('receiver_id')
                ->from('friendships')
                ->where('sender_id', $authUserId)
                ->whereIn('status', ['accepted', 'blocked']);
        })
            ->where('id', '!=', $authUserId)
            ->when($hasAuthUserSuggested, function ($query) use ($excludedUserIds) {
                $query->whereNotIn('id', $excludedUserIds);
            })
            ->get();

        // Prepare the response
        $usersWithStatus = [];
        foreach ($users as $user) {
            // Check if there is a relationship between the user and the authenticated user
            $friendship = Friendship::where(function($query) use ($authUserId, $user) {
                $query->where('sender_id', $authUserId)
                    ->where('receiver_id', $user->id);
            })->orWhere(function($query) use ($authUserId, $user) {
                $query->where('sender_id', $user->id)
                    ->where('receiver_id', $authUserId);
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
            'auth_user' => auth()->user(),
        ]);
    }

    public function add_friend(User $receiver) {
        Friendship::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $receiver->id
        ]);

        return response()->json(['message' => 'friend request added successfully']);
    }

    public function cancel_friend_req(User $receiver) {
        Friendship::where('sender_id', auth()->id())
            ->where('receiver_id', $receiver->id)
            ->delete();

        return response()->json(['message' => 'friend request deleted successfully']);
    }

    public function remove_friend(User $receiver) {
        SuggestedFriend::create([
            'user_id' => auth()->id(),
            'suggested_id' => $receiver->id,
            'suggested' => 'false'
        ]);

        return response()->json(['message' => 'Suggested friend removed successfully']);
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
