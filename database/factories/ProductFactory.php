<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'code' => $faker->languageCode,
        'description'=> $faker->streetName,
        'brand' => $faker->domainName ,
        'category'=> 'Llantas',
        'country' => $faker->country,
        'measure' => $faker->randomNumber(),
        'productCode' => $faker->postcode,
        'price' => $faker->numberBetween(10,400),
        'investment'=>$faker->numberBetween(10,500),
        'originalCode'=> $faker->currencyCode,
        'image'=> 'https://images-na.ssl-images-amazon.com/images/I/71tTWyypTKL._AC_SX522_.jpg',
        'quantity'=> $faker->numberBetween(1,20)
    ];
});
