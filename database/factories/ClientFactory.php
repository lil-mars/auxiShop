<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    $date = $faker->dateTimeBetween('-5 years');
    return [
        'company_name' => $faker->company,
        'father_last_name' => $faker->lastName,
        'mother_last_name' => $faker->firstNameFemale,
        'second_name' => $faker->firstName(),
        'name' => $faker->firstName(),
        'occupation' => $faker->jobTitle,
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'fax' => $faker->postcode,
        'created_at' => $date,
        'updated_at' => $date,
    ];
});
