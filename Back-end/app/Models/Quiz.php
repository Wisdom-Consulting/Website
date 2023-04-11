<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'body',
        'title',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_quiz_scores', 'quiz_id', 'user_id')
            ->withPivot('score');
    }

    public function question()
    {
        return $this->hasMany(Question::class);
    }

    public function answer()
    {
        return $this->hasMany(Answer::class);
    }
}
