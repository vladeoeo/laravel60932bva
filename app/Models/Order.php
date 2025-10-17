<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    use HasFactory;

    protected $primaryKey = 'order_id';
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function goods()
    {
        return $this->belongsToMany(
            Good::class,      // связанная модель
            'order_items',    // таблица связи
            'order_id',       // внешний ключ текущей модели (Order)
            'product_id'      // внешний ключ связанной модели (Good)
        )->withPivot(['price_at_moment','quantity']);
    }

}
