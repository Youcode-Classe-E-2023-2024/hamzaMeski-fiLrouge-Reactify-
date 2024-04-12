<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Friendship;
use App\Models\SuggestedFriend;
use App\Models\BlockFriend;

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
            ->where('status', 'pending')
            ->delete();

        return response()->json(['message' => 'friend request deleted successfully']);
    }

    public function remove_suggested_friend(User $receiver) {
        SuggestedFriend::create([
            'user_id' => auth()->id(),
            'suggested_id' => $receiver->id,
            'suggested' => 'false'
        ]);

        return response()->json(['message' => 'Suggested friend removed successfully']);
    }

    public function accept_friend(User $sender) {
        $friendship = Friendship::where('sender_id', $sender->id)
                    ->where('receiver_id', auth()->id())
                    ->where('status', 'pending')
                    ->first();

        $friendship->update([
            'status' => 'accepted'
        ]);

        return response()->json(['message' => 'friend request accepted successfully']);
    }

    public function ignore_friend(User $sender) {
        $friendship = Friendship::where('sender_id', $sender->id)
            ->where('receiver_id', auth()->id())
            ->where('status', 'pending')
            ->first();

        if($friendship) {
            $friendship->delete();
            return response()->json(['message' => 'friend request ignored successfully']);
        }

        return response()->json(['message' => 'No pending friend request found from this user']);
    }

    public function delete_friend(User $user) {
        $friendship = Friendship::where(function($query) use ($user) {
            $query->where('sender_id', $user->id)
                ->where('receiver_id', auth()->id())
                ->where('status', 'accepted');
        })
            ->orWhere(function($query) use ($user) {
                $query->where('sender_id', auth()->id())
                    ->where('receiver_id', $user->id)
                    ->where('status', 'accepted');
            })
            ->first();

        $friendship->delete();
        return response()->json(['message' => 'Friend deleted successfully']);
    }

    public function block_friend(User $user) {
        $friendship = Friendship::where(function($query) use ($user) {
            $query->where('sender_id', $user->id)
                ->where('receiver_id', auth()->id());
        })
            ->orWhere(function($query) use ($user) {
                $query->where('sender_id', auth()->id())
                    ->where('receiver_id', $user->id);
            })
            ->where('status', 'accepted')
            ->first();

        if($friendship) {
            // Update status to 'blocked'
            $friendship->update(['status' => 'blocked']);

            // Create a new record in the block_friend table
            BlockFriend::create([
                'friendship_id' => $friendship->id,
                'blocked_by_id' => auth()->id(),
                'blocked_user_id' => $user->id
            ]);

            return response()->json([
                'message' => 'Friend blocked successfully'
            ]);
        }

        return response()->json(['message' => 'No pending friend request found between these users']);
    }












    /* blade indexes */
    public  function  friends_home() {
        $clicked = 'home';
        return view('friends.home', compact( 'clicked'));
    }

    public function suggestions() {
        $clicked = 'suggestions';
        return view('friends.suggestions', compact( 'clicked'));
    }


    public function all_friends() {
        $users = User::join('friendships', function($join) {
            $join->on('users.id', '=', 'friendships.sender_id')
                ->where('friendships.receiver_id', '=', auth()->id())
                ->where('friendships.status', '=', 'accepted')
                ->orWhere(function($query) {
                    $query->on('users.id', '=', 'friendships.receiver_id')
                        ->where('friendships.sender_id', '=', auth()->id())
                        ->where('friendships.status', '=', 'accepted');
                })
                ->orWhere(function($query) {
                    $query->on('users.id', '=', 'friendships.sender_id')
                        ->where('friendships.receiver_id', '=', auth()->id())
                        ->where('friendships.status', '=', 'blocked');
                })
                ->orWhere(function($query) {
                    $query->on('users.id', '=', 'friendships.receiver_id')
                        ->where('friendships.sender_id', '=', auth()->id())
                        ->where('friendships.status', '=', 'blocked');
                });
        })
            ->leftJoin('block_friend', 'friendships.id', '=', 'block_friend.friendship_id')
            ->select('users.*', 'block_friend.blocked_by_id', 'block_friend.blocked_user_id', 'friendships.status as friendship_status')
            ->get();

        return response()->json([
            'users' => $users,
            'auth' => auth()->user()
        ]);
    }




    public function all_friends_index() {
        $clicked = 'all-friends';
        return view('friends.all-friends', compact( 'clicked'));
    }

    public function friend_requests() {
        $users = User::join('friendships', function($join) {
            $join->on('users.id', '=', 'friendships.sender_id')
                ->where('friendships.receiver_id', '=', auth()->id())
                ->where('friendships.status', '=', 'pending');
        })
            ->select('users.*')
            ->get();

        return response()->json($users);
    }

    public function friend_requests_index() {
        $clicked = 'friend-requests';
        return view('friends.friend-requests', compact( 'clicked'));
    }
}
