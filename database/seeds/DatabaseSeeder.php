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
        $this->call(SchoolSeeder::class);
        $this->call(LevelSeeder::class);
        $this->call(ClassGroupSeeder::class);
        $this->call(ClassRoomSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(StudentssSeeder::class);
        $this->call(TeachersSeeder::class);
    }
}
