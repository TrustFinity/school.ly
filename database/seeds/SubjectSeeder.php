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

        foreach ($school->classGroups as $class_group) {
            foreach (PRIMARY_SUBJECTS as $key => $value) {
                Subject::create([
                    'school_id' => $school->id,
                    'name'      => $value,
                    'class_group_id' => $class_group->id
                ]);
            }
        }
    }
}
