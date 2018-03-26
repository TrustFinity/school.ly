<?php

use App\Models\School;
use Illuminate\Database\Seeder;
use App\DarasiniFactories\DefualtGrading;

class GradingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (School::all() as $school) {
        	DefualtGrading::seed($school->id);
        }
    }
}