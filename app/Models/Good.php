<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Good extends Model
{
    protected $primaryKey = 'product_id';

    use SoftDeletes;

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

    use HasFactory;
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function orders()
    {
        return $this->belongsToMany(
            Order::class,     // с какой моделью связываемся
            'order_items',    // таблица-связка
            'product_id',     // внешний ключ текущей модели (Good)
            'order_id'        // внешний ключ связанной модели (Order)
        );
    }
    public function reviews()
    {
        return $this->hasMany(Review::class, 'product_id', 'product_id');
    }
}
