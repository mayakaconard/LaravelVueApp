<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Products;
use App\Orders;

class OrderDetails extends Model
{
    public function products()
    {
        return $this->hasMany(Products::class);
    }

    public function orders()
    {
        return $this->hasMany(Orders::class);
    }
}
