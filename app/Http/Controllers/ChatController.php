<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\MessageSent;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index() {
        return view('QA-page.chat.main');
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
}
