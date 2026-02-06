<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order query()
 * @mixin \Eloquent
 */
class Order extends Model
{
    protected $fillable = ['client_id'];

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_products', 'order_id', 'product_id')->withPivot('quantity', 'price_at_purchase');
    }
    public function total(): float
    {
        return $this->products->sum(fn($product) => $product->pivot->quantity * $product->pivot->price_at_purchase);
    }
}
