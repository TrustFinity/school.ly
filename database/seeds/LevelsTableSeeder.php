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
            'Nursery',
            'Primary',
            'Ordinary Level',
            'Advanced Level',
            'Technical School',
            'University'
        ] as $level) {
            Level::create([
                'name' => $level
            ]);
        }
    }
}
