<?php

use Illuminate\Database\Seeder;
use App\Models\Classes\Classgroup;

class ClassRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Classgroup::all() as $class_group) {
            $class = new \App\Models\Classes\Classroom();
            $class->name = $class_group->name .'-Yellow';
            $class->school_id = \App\School::first()->id;
            $class->classgroup_id = $class_group->id;
            $class->save();
        }
    }
}
