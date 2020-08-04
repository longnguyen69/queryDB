<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shiping extends Model
{
    protected $table = 'shipings';
    public function order_shiping()
    {
        return $this->hasMany(OrderShiping::class);
    }
}
