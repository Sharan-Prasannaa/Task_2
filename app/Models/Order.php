<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=[
        'user_id',
        'order_date',
        'total_amount',
        'status',
    ];

    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function orderItems():HasMany{
        return $this->hasMany(OrderItem::class);
    }
}
