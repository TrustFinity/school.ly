<?php

use App\Models\School;
use App\Models\Classes\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $school = School::first();

        foreach ($school->levels as $level) {
            foreach (PRIMARY_SUBJECTS as $key => $value) {
                Subject::create([
                    'school_id' => $school->id,
                    'name'      => $value,
                    'level_id'  => $level->id,
                ]);
            }
        }
    }
}
