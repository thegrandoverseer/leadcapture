<?php

use Faker\Generator as Faker;
use Webpatser\Uuid\Uuid;

/**
 * Randomly populate some of the keys in Lead class to simulate data where Leads
 * did not fill out all of the form fields
 */
$factory->define(App\Lead::class, function (Faker $faker) {
    $data = [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'sqft' => $faker->numberBetween(800, 3500)
    ];

    // get a random sampling of $arrayKeys to simulate data where Leads did not 
    // fill out all of the form fields - between 2 and 6 of the possible fields
    // (besides the id)
    $randKeys = array_rand(array_flip(array_keys($data)), rand(2, 6));
    $id = Webpatser\Uuid\Uuid::generate()->string;    

    // guarantee that id is always present, plus any additional randomly selected fields
    return array_merge(
        compact('id'), 
        array_intersect_key($data, array_flip($randKeys))
    );
});
