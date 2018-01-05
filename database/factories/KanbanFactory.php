<?php

/**
 * Created by PhpStorm.
 * User: ambrose
 * Date: 05/01/2018
 * Time: 12:45
 */

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(\App\Models\Kanban::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->randomElement([
            'Evolution',
            'Quantum Physics',
            'Heat and Heat Transfer',
            'Reproductive Health',
            'Human Anatomy',
            'The ngoni migration',
        ]),
        'description' => $faker->sentence,
        'status' => $faker->randomElement(['Planning', 'In Class', 'Testing', 'Completed']),
    ];
});