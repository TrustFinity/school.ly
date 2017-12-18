<?php

use App\Models\User;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('en_UG');
        $genders = ['Male', 'Female'];
        for ($i=0; $i < 10; $i++) {
            $randGender = array_rand($genders);
            $gender     = $genders[$randGender];

            $teacher = Teacher::create([
                'name'          => $faker->name($gender),
                'gender'        => $gender,
                // 'classroom_id'  => '',
                'level_id'      => '',
                'experience'    => '',
                'phone'         => $faker->phoneNumber
            ]);

            User::create([
                'name'          => $teacher->name,
                'email'         => $faker->email,
                'password'      => bcrypt('password'),
                'userable_id'   => $teacher->id,
                'userable_type' => 'Teacher'
            ]);
        }

        for ($i=0; $i < 30; $i++) {
            $randGender = array_rand($genders);
            $gender     = $genders[$randGender];

            $student = Student::create([
                'name'   => $faker->name($gender),
                'gender' => $gender,
                'dob'    => $faker->dateTimeBetween($startDate = '-19 years', $endDate = '-12 years'),
                'address' => $faker->streetAddress,
                // 'classroom_id' => '',
                // 'level_id' => '',
            ]);

            User::create([
                'name'          => $student->name,
                'email'         => $faker->email,
                'password'      => bcrypt(request('password')),
                'userable_id'   => $student->id,
                'userable_type' => 'Student'
            ]);
        }
    }
}
