<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shiping extends Model
{
    protected $table = 'shipings';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function order_shiping()
    {
        return $this->hasMany(OrderShiping::class);
    }
}
