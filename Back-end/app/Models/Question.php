<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'quiz_id',
        'title',
        'body',
    ];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function answer()
    {
        return $this->hasMany(Answer::class);
    }
}
