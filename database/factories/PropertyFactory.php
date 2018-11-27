<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Property::class, function (Faker $faker) {
    $types = ['TEXT', 'NUMBER', 'BOOLEAN'];
    $selectedType = array_rand($types);

    return [
        'name' => $faker->unique()->name,
        'type' => $types[$selectedType],
        'text_value' => ( $types[$selectedType] == 'TEXT' ) ? $faker->text : null,
        'number_value' => ( $types[$selectedType] == 'NUMBER' ) ? $faker->numberBetween(1,100) : null,
        'boolean_value' => ( $types[$selectedType] == 'BOOLEAN' ) ? $faker->boolean(50) : null
    ];
});