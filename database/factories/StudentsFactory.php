<?php
/**
 * Created by PhpStorm.
 * User: ambrose
 * Date: 28/12/2017
 * Time: 03:38
 */


/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Student::class, function (Faker\Generator $faker) {

    $school = \App\School::inRandomOrder()->first();
    $classroom = \App\Models\Classes\Classroom::where('school_id', $school->id)->first();

    return [
        'school_id' => $school->id,
        'classroom_id' => $classroom->id,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName(),
        'gender' => $faker->randomElement(['Male', 'Female']),
        'age' => $faker->numberBetween(3, 25),
        'parents_names' => $faker->name,
        'parents_phone_number' => $faker->phoneNumber,
        'address' => $faker->address,
        'photo_url' => '/photos/crane.jpg',
    ];
});