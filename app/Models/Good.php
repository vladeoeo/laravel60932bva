<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Good extends Model
{
    protected $primaryKey = 'product_id';
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'stock_quantity',
        'price',
        'category_id',
        'img_url',
        'category_id',
        'brand',
    ];

    // Отключаем автоматические created_at и updated_at
    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
