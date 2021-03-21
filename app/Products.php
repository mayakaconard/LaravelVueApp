<?php

namespace App;

use App\OrderDetails;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    public function orderDetails()
    {
        return $this->belongsTo(OrdersDetaiils::class);
    }
}
