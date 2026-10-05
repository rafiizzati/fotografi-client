<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    protected $primaryKey = 'user_id';

    protected $fillable = [
        'nama_lengkap', 'email', 'no_telepon', 'password', 'foto_profil', 'role',
    ];

    protected $hidden = ['password', 'remember_token'];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function alamats(): HasMany
    {
        return $this->hasMany(Alamat::class, 'user_id');
    }

    public function keranjangs(): HasMany
    {
        return $this->hasMany(Keranjang::class, 'user_id');
    }

    public function pesanans(): HasMany
    {
        return $this->hasMany(Pesanan::class, 'user_id');
    }

    public function ulasans(): HasMany
    {
        return $this->hasMany(Ulasan::class, 'user_id');
    }
}
