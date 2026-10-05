<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'user';
    protected $primaryKey = 'id_user';
    public $timestamps = false;

    protected $fillable = [
        'username',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
    ];

    public function getRememberToken()
    {
        return '';
    }

    public function setRememberToken($value): void
    {
        // Tabel user pada database tidak menggunakan remember_token.
    }

    public function getRememberTokenName()
    {
        return '';
    }

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
}
