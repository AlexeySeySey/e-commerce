<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Good::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'image'=>'/images/15.png',
        'weight' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 500.0),
        'weight_type'=>$faker->randomElement(['kg', 'l', 'th']),
        'price' => $faker->numberBetween($min = 1, $max = 100),
        'rating' => $faker->numberBetween($min = 1, $max = 10)
    ];
});
