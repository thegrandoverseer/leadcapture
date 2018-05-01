<?php

use Faker\Generator as Faker;
use Webpatser\Uuid\Uuid;

$factory->define(App\Lead::class, function (Faker $faker) {
    return [
        'id' => Webpatser\Uuid\Uuid::generate()->string,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'sqft' => $faker->numberBetween(800, 3500)
    ];
});
