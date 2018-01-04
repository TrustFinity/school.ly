<?php

use App\Models\Classes\Level;
use Illuminate\Database\Seeder;
use App\Models\Classes\ClassGroup;

class LevelsTableSeeder extends Seeder
{
    const LEVELS = [
        'Pre-School' => [
            'Day Care',
            'Baby Class',
            'Middle Class',
            'Top Class'
        ],
        'Primary' => [
            'P.1',
            'P.2',
            'P.3',
            'P.4',
            'P.5',
            'P.6',
            'P.7'
        ],
        'Ordinary Level' => [
            'S.1',
            'S.2',
            'S.3',
            'S.4'
        ],
        'Advanced Level' => [
            'S.5',
            'S.6'
        ],
        'Technical School' => [
            //todo
        ],
        'Tertiary Institution' => [
            //todo
        ],
        'University' => [
            //todo
        ]
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::LEVELS as $key => $value) {
            Level::create([
                'name' => $key
            ]);

            $level_id = Level::all()->last()->id;

            foreach ($value as $index => $name) {
                ClassGroup::create([
                    'level_id'  => $level_id,
                    'name'      => $name
                ]);
            }
        }
    }
}
