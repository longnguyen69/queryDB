<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $table = 'shops';

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function getAll()
    {
        return Shop::all();
    }

    public function findShop($id)
    {
        return Shop::find($id);
    }

    public function createShop($shop)
    {
        $shop->save();
    }

    public function getColumn($column)
    {
        return Shop::all()->pluck($column);
    }
}
