<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Student::class, function ($faker) {
    $faker = Faker\Factory::create('en_UG');

    $school = \App\Models\School::inRandomOrder()->first();
    $stream = \App\Models\Classes\Stream::first();
    $level = \App\Models\Classes\Level::inRandomOrder()->first();

    return [
        'school_id' => $school->id,
        'stream_id' => $stream->id,
        'level_id' => $faker->randomElement([null, $level->id]),
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName(),
        'gender' => $faker->randomElement(['Male', 'Female']),
        'dob' => $faker->dateTimeBetween($startDate = '-19 years', $endDate = 'now'),
        'parents_names' => $faker->name,
        'parents_phone_number' => $faker->phoneNumber,
        'address' => $faker->address,
        'photo_url' => null,
    ];
});
