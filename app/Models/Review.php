<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model {
    protected $table = 'reviews';

    public $timestamps = false;

    protected $fillable = [
        'review_id',
        'user_id',
        'product_id',
        'rating',
        'comment',
        'review_date'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function good()
    {
        return $this->belongsTo(Good::class, 'product_id', 'product_id');
    }
}
