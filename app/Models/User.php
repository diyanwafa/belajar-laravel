<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    public $timestamps = false;

    protected $fillable = [
        'username',
        'email',
        'password',
        'nama',
        'tanggal_lahir',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Satu user mempunyai banyak produk
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    // Mengecek apakah user adalah admin
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }
}