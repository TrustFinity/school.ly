<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\SupportStaff::class, function ($faker) {
    $faker = Faker\Factory::create('en_UG');
    $school = \App\Models\School::inRandomOrder()->first();

    return [
        'school_id'  => $school->id,
        'first_name' => $faker->firstName,
        'middle_name' => $faker->lastName,
        'last_name' => $faker->lastName,
        'gender' => $faker->randomElement(['Male', 'Female', 'Other']),
        'dob' => $faker->dateTimeBetween($startDate = '-60 years', $endDate = '-23'),
        'phone_number' => $faker->phoneNumber,
        'email' => $faker->email,
        'address' => $faker->address,
        'role' => $faker->randomElement(['Janitor', 'Compound Cleaner', 'Office Messenger', 'Sweeper', 'Cook', 'Electrician', 'Lab Assistant']),
        'next_of_kin_full_names' => $faker->name,
        'next_of_kin_phone_number' => $faker->phoneNumber,
        'address' => $faker->address,
        'photo_url' => null,
    ];
});