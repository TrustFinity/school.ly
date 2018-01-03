<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SchoolTableSeeder::class);

        //Generic Seeders
        $this->call(LevelsTableSeeder::class);
        $this->call(GradesSeeder::class);

        $this->call(ClassGroupSeeder::class);
        $this->call(SchoolPreferenceSeeder::class);

        $this->call(UserSeeder::class);
        // $this->call(UsersTableSeeder::class);

        $this->call(StudentsSeeder::class);
        $this->call(TeachersSeeder::class);

        //Teaching features
        $this->call(KanbanSeeder::class);
    }
}
