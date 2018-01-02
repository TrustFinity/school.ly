<?php

use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (["O'level", "A'level"] as $level) {
            $newlevel = new \App\Models\Classes\Level();
            $newlevel->name = $level;
            $newlevel->school_id = \App\Models\School::first()->id;
            $newlevel->save();
        }
    }
}
