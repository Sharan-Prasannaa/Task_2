<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=[
        'name',
        'description',
        'price',
        'stock',
        'category_id',
        'supplier_id',
    ];
    public function category():BelongsTo{
        return $this->belongsTo(Category::class);
    }

    public function supplier():BelongsTo{
        return $this->belongsTo(Supplier::class);
    }
    public function orderItems(): HasMany{
        return $this->hasMany(OrderItem::class);
    }
}
