<?php

use Carbon\Carbon;
use App\Models\School;
use App\Models\Examinations\Examination;
use Illuminate\Database\Seeder;

class ExaminationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (School::all() as $school) {
            Examination::create([
                'school_id' => $school->id,
                'name'      => 'Beginning Of Term',
                'start_date' => Carbon::parse('2018-02-10'),
                'end_date'  => Carbon::parse('2018-02-24'),
                'term_id'   => $school->terms()->first()->id,
            ]);
        }
    }
}
