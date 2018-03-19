<?php

use App\Models\School;
use Illuminate\Database\Seeder;
use App\Models\Examinations\Term;
class TermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (School::all() as $school) {
        	foreach (Term::TERMS as $term_name) {
        		$term = new Term;
        		$term->school_id = $school->id;
        		$term->name      = $term_name;
        		$term->save();
        	}
        }
    }
}