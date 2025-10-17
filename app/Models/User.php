<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    public function goods():HasMany
    {
        return $this->hasMany(Order::class,'order_id');
    }
}
