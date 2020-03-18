<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Models\Provider;
use Faker\Generator as Faker;

$factory->define(Provider::class, function (Faker $faker) {
    $max30 = function($string) {
        return mb_strlen($string) <= 30;
    };
    $date = $faker->dateTimeBetween('-5 years');
    return [
        'company_name' => $faker->company,
        'name' => $faker->name,
        'last_name' => $faker->lastName,
        'occupation' => $faker->jobTitle,
        'address' => $faker->address,
        'city' => $faker->city,
        'postal_code' => $faker->postcode,
        'country' => $faker->valid($max30)->country,
        'phone' => $faker->e164PhoneNumber,
        'fax' => $faker->countryCode,
        'created_at' => $date,
        'updated_at' => $date,
    ];
});
