<?php
namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isMember(): bool
    {
        return $this->role === 'member';
    }

    public function isUser(): bool
    {
        return $this->role === 'user';
    }

    // Relations with songs/albums if you want to attach to a user:
    public function songs()
    {
        return $this->hasMany(\App\Models\Song::class);
    }

    public function albums()
    {
        return $this->hasMany(\App\Models\Album::class);
    }
}
