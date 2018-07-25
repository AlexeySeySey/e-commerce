<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Sale::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'percentages'=>$faker->numberBetween($min = 1, $max = 99),
        'description'=>$faker->sentence(),
        'start'=>$faker->dateTime($max = 'now'),
        'end'=>$faker->dateTimeInInterval($startDate = '+1 day', $interval = '+ 1 year')
    ];
});
