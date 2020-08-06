<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $table = 'vouchers';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function order()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findVoucher($id)
    {
        return Voucher::find($id);
    }

    /**
     * @param $voucher
     */
    public function decrementVoucher($voucher)
    {
        $voucher->decrement('quantity', 1);
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return Voucher::paginate(25);
    }
}
