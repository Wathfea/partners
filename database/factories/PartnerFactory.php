<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Partner::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->name,
        'point' => rand(0,100) / 10
    ];
});
