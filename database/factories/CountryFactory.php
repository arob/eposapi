<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Country::class, function (Faker $faker) {
    return [
        'name' => $faker->country,
        'short_name' => $faker->countryCode,
        'status' => true
    ];
});
