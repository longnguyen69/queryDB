<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OrderProduct extends Model
{
    protected $table = 'order_producs';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findOrder($id)
    {
        return OrderProduct::where('order_id', $id)->get();
    }

    /**
     * @param $orderProduct
     */
    public function deleteOrderProduct($orderProduct)
    {
        $orderProduct->delete();
    }

    /**
     * @param $order_id
     * @return mixed
     */
    public function getProduct($order_id)
    {
        return OrderProduct::where('order_id',$order_id)->get();
    }

    /**
     * @param $order_id
     * @return Model|\Illuminate\Database\Query\Builder|object|null
     */
    public function sumOrder($order_id)
    {
        return DB::table('order_producs')->select(DB::raw('sum(quantity * price) as sum'))
                                               ->where('order_id', $order_id)
                                               ->first();
    }


}
