<?php

namespace App;

use App\OrderDetails;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    public function orderDetails()
    {
        return $this->belongsTo(OrderDetails::class);
    }
}
