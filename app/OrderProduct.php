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

    public function findOrder($id)
    {
        return OrderProduct::where('order_id', $id)->get();
    }

    public function deleteOrderProduct($orderProduct)
    {
        $orderProduct->delete();
    }
}
