<?php

use App\Models\School;
use App\Models\Classes\Stream;
use Illuminate\Database\Seeder;
use App\Models\Classes\ClassGroup;

class StreamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $primary_school_classes = ClassGroup::where('level_id', 2)->get();
        $ordinary_level_classes = ClassGroup::where('level_id', 3)->get();
        $advanced_level_classes = ClassGroup::where('level_id', 4)->get();

        foreach ($primary_school_classes as $class_group) {
            foreach (['Yellow', 'Green'] as $stream) {
                Stream::create([
                    'school_id'      => School::first()->id,
                    'class_group_id' => $class_group->id,
                    'name'           => $class_group->name ."-$stream"
                ]);
            }
        }
    }
}
