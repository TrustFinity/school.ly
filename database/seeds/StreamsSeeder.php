<?php

use App\Models\School;
use App\Models\Classes\Level;
use App\Models\Classes\Stream;
use Illuminate\Database\Seeder;

class StreamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //seeding for primary
        $school_id = School::first()->id;
        foreach (Level::first()->classGroups as $class_group) {
            foreach (['Yellow', 'Green'] as $stream) {
                Stream::create([
                    'school_id'      => $school_id,
                    'class_group_id' => $class_group->id,
                    'name'           => $class_group->name ."-$stream"
                ]);
            }
        }
    }
}
