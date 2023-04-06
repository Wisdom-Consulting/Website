<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    // define relationship with user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // define relationship with category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
