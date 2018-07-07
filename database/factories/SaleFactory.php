<?php

use Faker\Generator as Faker;

$factory->define(App\Sale::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'percentages'=>$faker->numberBetween($min = 1, $max = 99)
    ];
});
