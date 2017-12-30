<?php

use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $school_one = new \App\School();
        $school_one->name = 'AA new school one';
        $school_one->slug = 'aa-new-school-one';
        $school_one->school_url = 'www.schoolone.com';
        $school_one->address = 'New wintstones weather tower. VA';
        $school_one->headmasters_name = 'Mr. John Doe';
        $school_one->save();

        $school_two = new \App\School();
        $school_two->name = 'Disney Junior';
        $school_two->slug = 'aa-new-school-two';
        $school_two->school_url = 'www.schooltwo.com';
        $school_two->address = 'New wintstones weather tower. VA';
        $school_two->headmasters_name = 'Mr. John Doe';
        $school_two->save();
    }
}
