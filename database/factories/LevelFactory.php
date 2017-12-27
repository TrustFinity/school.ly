<?php
/**
 * Created by PhpStorm.
 * User: ambrose
 * Date: 27/12/2017
 * Time: 19:54
 */

$factory->define(App\Models\Classes\Level::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->randomElement(['Mwaka']),
    ];
});