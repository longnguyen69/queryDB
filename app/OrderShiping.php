<?php

namespace App;

use Carbon\Carbon;
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

    public function findOrderShiping($id)
    {
        return OrderShiping::where('orders_id', $id)->get();
    }

    public function deleteOrderShiping(OrderShiping $orderShiping)
    {
        return $orderShiping->delete();
    }

    /**
     * @param $shiping
     * @param $code
     * @param $from
     * @param $to
     * @param $id
     */
    public function createOrderShipping($shiping, $code, $from, $to, $id)
    {
        $orderShip = new OrderShiping();
        $orderShip->shiping_id = $shiping;
        $orderShip->code = $code;
        $orderShip->from = $from;
        $orderShip->to = $to;
        $orderShip->shipment_date = Carbon::now();
        $orderShip->expect_delivery_date = Carbon::now()->addDays(3);
        $orderShip->orders_id = $id;
        $orderShip->save();
    }
}
