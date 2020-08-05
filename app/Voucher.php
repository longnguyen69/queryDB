<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $table = 'vouchers';

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function getOrderVoucher($id)
    {
        return Voucher::find($id);
    }

    public function decrementVoucher($voucher)
    {
        $voucher->decrement('quantity', 1);
    }
}
