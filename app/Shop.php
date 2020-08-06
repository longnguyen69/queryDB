<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $table = 'shops';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function order()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return Shop::paginate(25);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findShop($id)
    {
        return Shop::find($id);
    }

    /**
     * @param $shop
     */
    public function createShop($shop)
    {
        $shop->save();
    }

    /**
     * @param $column
     * @return \Illuminate\Support\Collection
     */
    public function getColumn($column)
    {
        return Shop::all()->pluck($column);
    }
}
