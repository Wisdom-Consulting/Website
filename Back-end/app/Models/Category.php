<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // define relationship with content
    public function content()
    {
        return $this->hasMany(Content::class);
    }
}
