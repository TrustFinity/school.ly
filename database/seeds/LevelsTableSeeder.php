<?php

use App\Models\Level;
use Illuminate\Database\Seeder;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ([
            'Pre-School',
            'Primary',
            'Ordinary Level',
            'Advanced Level',
            'Technical School',
            'Tertiary Institution',
            'University'
        ] as $level) {
            Level::create([
                'name' => $level
            ]);
        }
    }
}
