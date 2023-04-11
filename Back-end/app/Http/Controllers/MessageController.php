<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        dd($request->all());
        // Create a new chat
//        $chat = Chat::create();
//        // Attach the participants to the chat
//        $chat->users()->attach($request->user_id);
//        $chat->users()->attach($request->receiver_id);
//        $message = Message::create([
//            'user_id' => $request->user_id,
//            'chat_id' => $chat->id,
//            'message' => $request->message,
//        ]);
//        return $message;

        $senderId = auth()->user()->id;
        $receiverId = $request->receiver_id;

        // Check if a chat already exists with both participants
        $chat = Chat::whereHas('users', function ($query) use ($senderId, $receiverId) {
            $query->whereIn('user_id', [$senderId, $receiverId]);
        }, '=', 2)->first();

        // If no chat exists, create a new chat
        if (!$chat) {
            $chat = Chat::create();
            $chat->users()->attach($senderId);
            $chat->users()->attach($receiverId);
        }

        // Create the new message
        return Message::create([
            'user_id' => $senderId,
            'chat_id' => $chat->id,
            'message' => $request->message,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        //
    }
}
