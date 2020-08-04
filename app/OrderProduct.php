<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $table = 'order_producs';
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
