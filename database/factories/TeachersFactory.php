<?php
/**
 * Created by PhpStorm.
 * User: ambrose
 * Date: 28/12/2017
 * Time: 03:38
 */

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Teacher::class, function (Faker\Generator $faker) {

    $school = \App\School::inRandomOrder()->first();

    return [
        'school_id' => $school->id,
        'first_name' => $faker->firstName,
        'middle_name' => $faker->lastName,
        'last_name' => $faker->lastName(),
        'gender' => $faker->randomElement(['Male', 'Female']),
        'age' => $faker->numberBetween(3, 25),
        'experience' => $faker->numberBetween(0, 5).' yrs',
        'next_of_kin_names' => $faker->name,
        'next_of_kin_phone_number' => $faker->phoneNumber,
        'address' => $faker->address,
        'photo_url' => 'photos/crane.jpg',
    ];
});