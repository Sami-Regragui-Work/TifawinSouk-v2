<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function orderProducts()
    {
        return $this->belongsToMany(Order::class, 'order_products', 'product_id', 'order_id')->withPivot('quantity', 'price_at_purchase');
    }
    public function cartProducts()
    {
        return $this->belongsToMany(Cart::class, 'cart_products', 'product_id', 'cart_id')->withPivot('quantity');
    }
}
