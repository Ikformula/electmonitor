<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Place::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'found_in_place_id' => 2,
        'place_type_id' => 5
    ];
});
