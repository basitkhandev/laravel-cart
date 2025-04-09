<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = [
        'user_id'
    ];

    /**
     * This method defines the relation between order and user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * This method defines the relation between order and order items
     */
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
