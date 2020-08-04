<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Voucher::class, function (Faker $faker) {
    return [
        'discountable_type' => $faker->text(40),
        'discountable_id' => $faker->randomNumber(),
        'title' => $faker->title,
        'coupon' => $faker->text(45),
        'type' => $faker->text(40),
        'discount' => $faker->randomNumber(),
        'quantity' => $faker->randomNumber(),
        'begin_at' => new DateTime(),
        'end_at' => new DateTime(),
        'display' => $faker->randomNumber(),
        'minimum_order_price' => $faker->randomNumber()
    ];
});
