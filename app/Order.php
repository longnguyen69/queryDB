<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function voucher()
    {
        return $this->belongsTo(Voucher::class);
    }

    public function order_produc()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function order_shiping()
    {
        return $this->belongsTo(OrderShiping::class);
    }
}
