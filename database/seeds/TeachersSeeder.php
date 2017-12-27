<?php

use Illuminate\Database\Seeder;

class TeachersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 50 ; $i++) {
            factory(\App\Models\Teacher::class)->make()->save();
        }
    }
}
