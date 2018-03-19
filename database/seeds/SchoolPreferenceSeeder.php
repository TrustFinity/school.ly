<?php

use Illuminate\Database\Seeder;

class SchoolPreferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (\App\Models\School::all() as $school) {
            $settings = new App\Models\Settings\Setting();
            $settings->school_id = $school->id;
            $settings->lower_grade_level = 40;
            $settings->upper_grade_level = 75;
            $settings->save();
        }
    }
}
