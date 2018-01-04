<?php
/**
 * Created by PhpStorm.
 * User: ambrose
 * Date: 27/12/2017
 * Time: 19:55
 */

$factory->define(App\Models\Classes\Stream::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
