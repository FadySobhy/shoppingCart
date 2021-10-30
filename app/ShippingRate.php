<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShippingRate extends Model
{
    protected $fillable = ['country', 'rate'];

    public function products() {
        return $this->hasMany(Product::class, 'shipping_id');
    }
}
