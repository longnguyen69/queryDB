<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderShiping extends Model
{
    protected $table = 'order_shipings';

    public function shiping()
    {
        return $this->belongsTo(Shiping::class);
    }

    public function order()
    {
        return $this->hasOne(Order::class);
    }
}
