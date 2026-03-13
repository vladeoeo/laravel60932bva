<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable; // ← ВАЖНО

class User extends Authenticatable
{
    use HasFactory;
    use HasApiTokens, Notifiable;

    public $timestamps = false;

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
