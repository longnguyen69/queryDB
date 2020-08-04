<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Shop::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'business_license' => $faker->randomNumber(),
        'tax_code' => $faker->randomNumber(),
        'about' => $faker->text(20),
        'status' => $faker->text(20),
        'approved' => $faker->text(20),
        'ward_id' => $faker->randomNumber(),
        'address_detail' => $faker->address,
        'created_at' => new DateTime(),
        'updated_at' => new DateTime()
    ];
});
