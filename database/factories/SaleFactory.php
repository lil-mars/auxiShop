<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;


$factory->define(\App\Models\Sale::class, function (Faker $faker) {

    $date = $faker->dateTimeBetween('-5 years');
    return [
        'client_id' => $faker->numberBetween(1, 25),
        'store_id' => $faker->numberBetween(1, 4),
        'total_price' => $faker->randomFloat(2,10, 1000),
        'total_amount' => $faker->numberBetween(5, 30),
        'created_at' => $date,
        'updated_at' => $date,
    ];
});
