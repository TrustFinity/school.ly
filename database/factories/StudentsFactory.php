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
        'dob' => $faker->dateTimeBetween($startDate = '-18 years', $endDate = '-6 years'),
        'parents_names' => $faker->name,
        'parents_phone_number' => $faker->phoneNumber,
        'address' => $faker->address,
        'photo_url' => null,
        'is_active' => $faker->randomElement([true, false]),
        'joining_year' => $faker->dateTimeBetween($startDate = '-8 years', $endDate = 'now'),
        'leaving_year' => $faker->dateTimeBetween($startDate = '-8 years', $endDate = 'now'),
    ];
});
