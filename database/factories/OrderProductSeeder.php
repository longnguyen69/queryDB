<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\OrderProduct;
use Faker\Generator as Faker;

$factory->define(OrderProduct::class, function (Faker $faker) {
    return [
        'product_stock_id' => $faker->randomNumber(),
        'quantity' => $faker->randomNumber(),
        'price' => $faker->randomNumber(),
        'discount' => $faker->randomNumber(),
        'order_id' => \App\Order::all()->random()->id,
        'created_at' => new DateTime(),
        'updated_at' => new DateTime()
    ];
});
