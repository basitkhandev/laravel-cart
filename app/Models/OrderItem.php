<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'order_id'
    ];

    /**
     * This method defines the relation between order items and product
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * This method defines the relation between order items and order
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
