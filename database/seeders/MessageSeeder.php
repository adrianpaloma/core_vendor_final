<?php

namespace Database\Seeders;

use App\Models\Message;
use App\Models\Conversation;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $conversation = Conversation::create([
            'recipient_id' => 'acct_1RPyvXPJFP9IMrDA',
            'sender_id' => 1,
            'sender_name' => 'Ken',
            'sender_email' => 'ken@gmail.com',
            'subject' => 'Billing Question'
        ]);

        // Simulate a received message
        Message::create([
            'conversation_id' => $conversation->id,
            'type' => 'receive', // or 'receive_message' if that's your enum
            'content' => 'When does my next billing cycle start?'
        ]);

        // Simulate a sent message
        Message::create([
            'conversation_id' => $conversation->id,
            'type' => 'send', // or 'send_message'
            'content' => 'Hi Ken, your billing cycle starts on the 15th of each month.'
        ]);
    }
}
