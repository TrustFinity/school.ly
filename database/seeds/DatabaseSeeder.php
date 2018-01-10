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

        //school specific seeders
        $this->call(StreamSeeder::class);

        $this->call(SchoolPreferenceSeeder::class);

        $this->call(UsersTableSeeder::class);

        $this->call(StudentsSeeder::class);
        $this->call(TeachersSeeder::class);

        //Teaching features
        $this->call(KanbanSeeder::class);
    }
}
