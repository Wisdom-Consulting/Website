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
        'quiz_fields_id',
        'level_id'
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

    public function quiz_field()
    {
        return $this->belongsTo(QuizField::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }
}
