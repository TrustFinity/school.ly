<?php

use Illuminate\Database\Seeder;
use App\Models\Classes\Classgroup;

class TeachersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 50; $i++) {
            $teacher = factory(\App\Models\Teacher::class)->make();
            $teacher->class_group_id = Classgroup::inRandomOrder()->first()->id;
            $teacher->search_term = $teacher->constructSearchTerm();
            $teacher->save();
        }
    }
}
