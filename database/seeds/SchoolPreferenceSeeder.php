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
        // Create a faker factory for this.
        // Seed different school types.w
        foreach (\App\Models\School::all() as $school) {
            $settings = new App\Models\Settings\Setting();
            $settings->school_id = $school->id;
            $settings->save();
        }
    }
}
