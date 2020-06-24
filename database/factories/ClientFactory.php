<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Client::class, function (Faker $faker) {
    $date = $faker->dateTimeBetween('-5 years');
    return [
        'company_name' => $faker->company,
        'father_last_name' => $faker->lastName,
        'mother_last_name' => $faker->firstNameFemale,
        'second_name' => $faker->firstName(),
        'name' => $faker->firstName(),
        'occupation' => substr($faker->jobTitle(), 0,20),
        'address' => $faker->address,
        'phone' => '411251252',
        'fax' => $faker->postcode,
        'nit' => $faker->numberBetween(444444),
        'ci' => $faker->bankAccountNumber,
        'created_at' => $date,
        'updated_at' => $date,
    ];
});
