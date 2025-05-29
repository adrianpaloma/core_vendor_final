<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $fillable = [
        'sender_id',
        'recipient_id',
        'sender_name',
        'sender_email',
        'subject'
    ];

    public function message()
    {
        return $this->hasMany(Message::class);
    }
}
