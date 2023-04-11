<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $appends = ['last_message'];

    // Define the relationship with the message model
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    // Define the relationship with the user model

    public function users()
    {
        return $this->belongsToMany(User::class, 'chat_participants', 'chat_id', 'user_id');
    }

    public function lastMessage(): Attribute
    {
        // return attributes of the last message
        return new Attribute(function () {
            return $this->messages()->latest()->first();
        });
    }
}
