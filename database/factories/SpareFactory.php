<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Spare::class, function (Faker $faker) {
    $date = $faker->dateTimeBetween('-5 years');
    return [
        'code'=> $faker->bankAccountNumber,
        'category_id' => $faker->numberBetween(1,5),
        'car_line_id' => $faker->numberBetween(1,5),
        'brand_id' => $faker->numberBetween(1,5),
        'description' => $faker->text(50),
        'nationality' => $faker->country,
        'measure' => $faker->hexColor,
        'product_code' => $faker->ean8,
        'original_code' => $faker->ean8,
        'quantity' => $faker->numberBetween(10, 100),
        'price' => $faker->randomFloat(2, 2, 300),
        'price_m' => $faker->randomFloat(2, 2, 300),
        'investment' => $faker->randomFloat(2, 0.5, 200 ),
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/8/84/Claw-hammer.jpg',
        'created_at' => $date,
        'updated_at' => $date,
    ];
});
