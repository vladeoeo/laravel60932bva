<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{

    protected $primaryKey = 'category_id';
    use HasFactory;
    public function goods():HasMany
    {
        return $this->hasMany(Good::class,'category_id');
    }
}
