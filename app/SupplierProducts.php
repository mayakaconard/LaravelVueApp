<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Products;
use App\Suppliers;

class SupplierProducts extends Model
{
    public function products()
    {
        return $this->hasMany(Products::class, 'id');
    }

    public function suppliers()
    {
        return $this->hasMany(Suppliers::class, 'id');
    }
}
