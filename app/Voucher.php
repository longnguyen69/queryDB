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
}
