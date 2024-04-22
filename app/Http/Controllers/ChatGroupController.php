<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\GroupMessageSent;
use App\Models\ChatGroup;
use App\Models\GroupMessage;
use App\Models\UserGroup;
use App\Models\User;
use App\Models\Friendship;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ChatGroupController extends Controller
{
    public function index() {
        $userId = Auth::id();

        // groups
        $groups = [];
        $userGroups = UserGroup::where('receiver_id', $userId)->where('status', 'accepted')->get();
        foreach ($userGroups as $userGroup) {
            $groupId = $userGroup->group_id;
            $group = ChatGroup::find($groupId);
            if($group->creator_id) $groups[] = $group;
        }

        // my created groups
        $my_created_groups = ChatGroup::where('creator_id', auth()->id())->latest()->get();

        // my friends
        $my_friends = Friendship::where(function($query) {
            $query->where('sender_id', auth()->id())
                ->orWhere('receiver_id', auth()->id());
        })
            ->where('status', 'accepted')
            ->get();
        $friends = [];
        foreach($my_friends as $friendship) {
            if ($friendship->sender_id == auth()->id()) {
                $friend_id = $friendship->receiver_id;
            } else {
                $friend_id = $friendship->sender_id;
            }

            $friend = User::find($friend_id);
            if ($friend) {
                $friends[] = $friend;
            }
        }

        return view('QA-page.chat-group.main', compact( 'friends', 'groups', 'my_created_groups'));
    }

    public function create_group()
    {
        $validator = Validator::make(request()->all(), [
            'name' => 'required|min:5',
            'image' => 'required|image',
            'description' => 'required|min:10'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $validatedData = $validator->validated();

        $imagePath = request()->file('image')->store('group_images', 'public');

        $imageName = basename($imagePath);

        $validatedData['image'] = $imageName;

        $validatedData['creator_id'] = auth()->id();

        ChatGroup::create($validatedData);

        return response()->json([
            'message' => 'Group created successfully'
        ]);
    }



    public function invite_people($groupId) {
        $checked_users = \request()->checked_users;
        foreach ($checked_users as $receiverId) {
            UserGroup::create([
                'receiver_id' => $receiverId,
                'group_id' => $groupId
            ]);
        }

        return response()->json([
            'status' => 'invite request sent successfully'
        ]);
    }

    public function sendGroupMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
            'group_id' => 'required|exists:chat_groups,id',
        ]);

        // Extract message and receiver ID from request
        $message = $request->input('message');
        $groupId = $request->input('group_id');

        // Create a new Message instance and save it to the database
        $newMessage = new GroupMessage();
        $newMessage->sender_id = Auth::id();
        $newMessage->group_id = $groupId;
        $newMessage->message = $message;
        $newMessage->save();

        // Broadcast the MessageSent event
        broadcast(new GroupMessageSent($newMessage->message));

        // Return a JSON response indicating success
        return response()->json(['status' => 'GroupMessage Sent!']);
    }

    public function get_group_messages($groupId) {
        $userId = auth()->id();
        $existsInGroup = DB::table('user_group')
            ->where('receiver_id', auth()->id())
            ->where('group_id', $groupId)
            ->where('status', 'accepted')
            ->exists();

        $isCreator = ChatGroup::where('creator_id', auth()->id())
            ->where('id', $groupId)
            ->exists();

        if($existsInGroup || $isCreator) {
            $messages = DB::table('group_messages')
                ->select('group_messages.*', 'users.name as sender_name', 'users.image as sender_image')
                ->join('users', 'group_messages.sender_id', '=', 'users.id')
                ->where('group_messages.group_id', $groupId)
                ->get();

            return response()->json($messages);
        }

        return response()->json('You are not authenticated to read those images');
    }

    public function latest_group_messages($groupId) {
        $messages = GroupMessage::where('group_id', $groupId);
        $senders_messages = [];
        foreach ($messages as $message) {
            $senders_messages[] = [
                'message' => $message->message,
                'sender' => User::where('id', $message->sender_id)
            ];
        }

        return response()->json($senders_messages);
    }

    public function get_groups_request() {
        $groups = [];
        $userGroups = UserGroup::where('receiver_id', auth()->id())->where('status', 'pending')->get();
        foreach ($userGroups as $userGroup) {
            $groupId = $userGroup->group_id;
            $group = ChatGroup::find($groupId);
            if ($group && $group->creator_id) {
                $groups[] = $group;
            }
        }
        return response()->json($groups);
    }

    public function accept_group_request($groupId){
        $row = UserGroup::where('receiver_id', auth()->id())->where('group_id', $groupId);
        $row->update([
            'status' => 'accepted'
        ]);

        return response()->json($row);
    }

    public function refuse_group_request($groupId){
        $row = UserGroup::where('receiver_id', auth()->id())->where('group_id', $groupId);
        $row->delete();

        return response()->json([
            'status' => 'group request refused successfully'
        ]);
    }
}
