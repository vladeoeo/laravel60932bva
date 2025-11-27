<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_item extends Model
{
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function good()
    {
        return $this->belongsTo(Good::class, 'product_id', 'product_id');
    }
}
