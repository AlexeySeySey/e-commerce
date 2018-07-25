<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Good::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'image'=>'15.png',
        'weight' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 500.0),
        'weight_type'=>$faker->randomElement(['kg', 'l', 'th']),
        'price' => $faker->numberBetween($min = 1, $max = 100),
        'rating' => $faker->numberBetween($min = 1, $max = 10),
        'categories_id' => $faker->numberBetween($min = 1, $max = 9),
        'characteristics_id'=>$faker->unique()->numberBetween($min = 1, $max = 60),
        'sales_id'=>$faker->numberBetween($min = 1, $max = 10)
    ];
});
