<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\OrderShiping;
use Faker\Generator as Faker;

$factory->define(OrderShiping::class, function (Faker $faker) {
    return [
        'shiping_id' => \App\Shiping::all()->random()->id,
        'code' => $faker->text(20),
        'from' => $faker->text(25),
        'to' => $faker->address,
        'shipment_date' => new DateTime(),
        'expect_delivery_date' => new DateTime(),
        'orders_id' => \App\Order::all()->random()->id,
        'created_at' => new DateTime(),
        'updated_at' => new DateTime()
    ];
});
