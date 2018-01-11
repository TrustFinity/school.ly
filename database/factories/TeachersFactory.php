<?php
/**
 * Created by PhpStorm.
 * User: ambrose
 * Date: 28/12/2017
 * Time: 03:38
 */

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Teacher::class, function ($faker) {
    $faker = Faker\Factory::create('en_UG');
    $school = \App\Models\School::inRandomOrder()->first();

    return [
        'school_id' => $school->id,
        'first_name' => $faker->firstName,
        'middle_name' => $faker->lastName,
        'last_name' => $faker->lastName,
        'gender' => $faker->randomElement(['Male', 'Female']),
        'dob' => $faker->dateTimeBetween($startDate = '-60 years', $endDate = '-23'),
        'experience' => $faker->numberBetween(0, 5).' yrs',
        'next_of_kin_names' => $faker->name,
        'next_of_kin_phone_number' => $faker->phoneNumber,
        'address' => $faker->address,
        'photo_url' => null,
    ];
});
