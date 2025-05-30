<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function vendor_send_msg(Request $request)
    {
        $convo = Conversation::firstOrCreate([
            'id' => $request->convo_id
        ]);

        Message::create([
            'conversation_id' => $convo->id,
            'type' => 'send',
            'content' => $request->reply_content
        ]);

        return redirect()->back();
    }

    public function vendor_receive_msg(Request $request)
    {
        try {
            $request->validate([
                'vendor_id' => 'required',
                'sender_id' => 'required',
                'subject' => 'nullable',
                'sender_name' => 'required',
                'sender_email' => 'required',
                'content' => 'required'
            ]);

            $convo = Conversation::firstOrCreate(
                [
                    'sender_id' => $request->sender_id,
                    'recipient_id' => $request->vendor_id
                ],
                [
                    'subject' => $request->subject,
                    'sender_name' => $request->sender_name,
                    'sender_email' => $request->sender_email
                ]
            );

            Message::create(
                [
                    'conversation_id' => $convo->id,
                    'type' => 'receive',
                    'content' => $request->content
                ]
            );

            return response()->json([
                'success' => true,
                'message' => 'Message sent.',
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
