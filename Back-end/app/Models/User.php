<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use LaravelArchivable\Archivable;
use Spatie\Permission\Traits\HasRoles;
use SpatiePermissionVue\Traits\RolesPermissionsToVue;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, Archivable, RolesPermissionsToVue;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // define relationship with content
    public function content()
    {
        return $this->hasMany(Content::class);
    }

    // define relationship with quiz
    public function quiz()
    {
        return $this->hasMany(Quiz::class);
    }

    // define relationship with message
    public function message()
    {
        return $this->hasMany(Message::class);
    }

    // define relationship with chat
    public function chat()
    {
        return $this->hasMany(Chat::class);
    }

    // define relationship with chat participant
    public function chatParticipant()
    {
        return $this->hasMany(ChatParticipant::class);
    }

    // define relationship with question
    public function question()
    {
        return $this->hasMany(Question::class);
    }

    // define relationship with answer
    public function answer()
    {
        return $this->hasMany(Answer::class);
    }

    // define relationship with comment
    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    // define relationship with like
    public function like()
    {
        return $this->hasMany(Like::class);
    }

    // define relationship with post
    public function post()
    {
        return $this->hasMany(Post::class);
    }

}
