<?php

use Illuminate\Database\Seeder;

class ClassGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (['P1', 'P2', 'P3', 'P4', 'P5', 'P6', 'P7', 'S1', 'S2', 'S3', 'S4'] as $class) {
            $classroom = new \App\Models\Classes\Classgroup();
            $classroom->name = $class;
            $classroom->school_id = \App\School::first()->id;
            $classroom->save();
        }
    }
}
