<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'weight', 'shipping_id'];

    public function shipping_rate() {
        return $this->belongsTo(ShippingRate::class, 'shipping_id');
    }
}
