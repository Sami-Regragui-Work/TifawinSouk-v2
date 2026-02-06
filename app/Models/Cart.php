<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart query()
 * @mixin \Eloquent
 */
class Cart extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    /** @use HasFactory<\Database\Factories\CartFactory> */
    use HasFactory;
}
