<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function inventory()
    {
        return $this->hasOne(Inventory::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
