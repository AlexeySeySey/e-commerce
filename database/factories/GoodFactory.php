<?php

use Faker\Generator as Faker;

$factory->define(App\Good::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'weight' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 500.0),
        'price' => $faker->numberBetween($min = 1, $max = 100),
        'rating' => $faker->numberBetween($min = 1, $max = 10),
        'categories_id' => $faker->numberBetween($min = 1, $max = 9)
    ];
});
