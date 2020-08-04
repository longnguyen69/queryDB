<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Shiping::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'information' => $faker->text(45)
    ];
});
