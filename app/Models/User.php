<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'pass',
        'type',
        'tel',
        'location',
        'photo',
        'is_first',
        'created_by',
        'status',
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

    public function restos() {
        return $this->hasMany(Resto::class, 'user_id');
    }
    public function cats() {
        return $this->hasMany(Category::class, 'user_id');
    }
    public function prods() {
        return $this->hasMany(Product::class, 'user_id');
    }
    public function gerants() {
        return $this->hasMany(Gerant::class, 'user_id');
    }
    public function menus() {
        return $this->hasMany(Menu::class, 'user_id');
    }
}
