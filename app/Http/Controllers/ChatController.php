<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\MessageSent;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index() {
        $friends = User::all();
        return view('QA-page.chat.main', compact('friends'));
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
            'receiver_id' => 'required|exists:users,id',
        ]);

        // Extract message and receiver ID from request
        $message = $request->input('message');
        $receiverId = $request->input('receiver_id');

        // Create a new Message instance and save it to the database
        $newMessage = new Message();
        $newMessage->sender_id = Auth::id();
        $newMessage->receiver_id = $receiverId;
        $newMessage->message = $message;
        $newMessage->save();

        // Broadcast the MessageSent event
//        broadcast(new MessageSent($newMessage))->toOthers(); // Broadcast to others (exclude the current user)
        broadcast(new MessageSent($newMessage->message));

        // Return a JSON response indicating success
        return response()->json(['status' => 'Message Sent!']);
    }

    public function get_friend_messages(User $user) {
        $messages = Message::where(function ($query) use ($user) {
                                $query->where('sender_id', auth()->id())
                                    ->where('receiver_id', $user->id);
                            })
                            ->orWhere(function ($query) use ($user) {
                                $query->where('sender_id', $user->id)
                                    ->where('receiver_id', auth()->id());
                            })
                            ->get();

        return response()->json($messages);
    }

    public function get_last_inserted_message() {
        $last_message = Message::latest()->first();

        return response()->json($last_message);
    }
}
