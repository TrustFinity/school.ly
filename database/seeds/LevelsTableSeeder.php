<?php

use App\Models\Classes\Level;
use Illuminate\Database\Seeder;
use App\Models\Classes\ClassGroup;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //seed for first school (Primary)
        Level::create([
            'name' => 'Primary'
        ]);

        $level_id = Level::all()->last()->id;

        foreach (LEVELS['Primary'] as $index => $name) {
            ClassGroup::create([
                'school_id' => 1,
                'level_id'  => $level_id,
                'name'      => $name
            ]);
        }
    }
}
