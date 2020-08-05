<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 * @package App
 */
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

    public function init()
    {

    }

    public function order_shiping()
    {
        return $this->belongsTo(OrderShiping::class);
    }

    public function getOrder($id)
    {
        return Order::where('shop_id', $id)->get();
    }

    public function getAll()
    {
        return Order::all();
    }

    public function findOrder($id)
    {
        return Order::find($id);
    }

    /**
     * @param $type
     * @param $find_user_code
     * @param $content
     * @param $note
     * @param $transport_fee
     * @param $discount
     * @param $status
     * @param $final_price
     * @param $reason
     * @param $cancel_by
     * @param $price
     * @param $voucher
     * @param $shop
     */
    public function create($type, $find_user_code, $content, $note, $transport_fee, $discount, $status, $final_price, $reason, $cancel_by, $price, $voucher, $shop)
    {
        $order = new Order();
        $order->type = $type;
        $order->fiin_user_code = $find_user_code;
        $order->content = $content;
        $order->note = $note;
        $order->transport_fee = $transport_fee;
        $order->discount = $discount;
        $order->status = $status;
        $order->final_price = $final_price;
        $order->reason = $reason;
        $order->cancel_by = $cancel_by;
        $order->price = $price;
        $order->voucher_id = $voucher;
        $order->shop_id = $shop;
        $order->save();
    }

    /**
     * @param array $id
     * @param array $type
     * @param $find_user_code
     * @param $content
     * @param $note
     * @param $transport_fee
     * @param $discount
     * @param $status
     * @param $final_price
     * @param $reason
     * @param $cancel_by
     * @param $price
     * @param $voucher
     * @param $shop
     * @return bool|void
     */
    public function update($id, $type, $find_user_code, $content, $note, $transport_fee, $discount, $status, $final_price, $reason, $cancel_by, $price, $voucher, $shop)
    {
        $order = $this->findOrder($id);
        $order->type = $type;
        $order->fiin_user_code = $find_user_code;
        $order->content = $content;
        $order->note = $note;
        $order->transport_fee = $transport_fee;
        $order->discount = $discount;
        $order->status = $status;
        $order->final_price = $final_price;
        $order->reason = $reason;
        $order->cancel_by = $cancel_by;
        $order->price = $price;
        $order->voucher_id = $voucher;
        $order->shop_id = $shop;
        $order->save();
    }

    /**
     * @param $order
     */
    public function deleteOrder($order)
    {
        $order->delete();
    }
}
