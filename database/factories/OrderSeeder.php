<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'type' => $faker->regexify('[a-zA-Z]{20}'),
        'fiin_user_code' => $faker->randomNumber(),
        'content' => $faker->text(),
        'note' => $faker->regexify('[a-zA-Z]{50}'),
        'transport_fee' => $faker->randomNumber(),
        'discount' => $faker->randomNumber(),
        'status' => $faker->regexify('[a-zA-Z]{20}'),
        'final_price' => $faker->randomNumber(),
        'reason' => $faker->userName,
        'cancel_by' => $faker->randomNumber(),
        'price' => $faker->randomNumber(),
        'voucher_id' => \App\Voucher::all()->random()->id,
        'shop_id' => \App\Shop::all()->random()->id,
        'created_at' => new DateTime(),
        'updated_at' => new DateTime()
    ];
});
