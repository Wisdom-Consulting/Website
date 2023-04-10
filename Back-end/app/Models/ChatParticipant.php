<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatParticipant extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'chat_id',
    ];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function chat()
    {
        return $this->belongsTo(Chat::class);
    }
}
