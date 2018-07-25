<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Characteristic::class, function (Faker $faker) {
    return [
        'goods_id'   => $faker->unique()->numberBetween($min = 1, $max = 60),
        'stock'      => $faker->numberBetween($min = 1, $max = 800),
        'producer'   => $faker->company,
        'address'    => $faker->city.' '.$faker->secondaryAddress,
        'produced'   => $faker->date($format = 'Y-m-d', $max = 'now').' '.$faker->time($format = 'H:i:s', $max = 'now'),
        'expiration' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'phone'      => $faker->tollFreePhoneNumber,
        'mail'       => $faker->email
    ];
});
