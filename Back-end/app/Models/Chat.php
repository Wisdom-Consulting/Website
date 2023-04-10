<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

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
}
