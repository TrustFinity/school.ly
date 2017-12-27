<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (\App\School::all() as $school){
            $user = new \App\Models\User();
            $user->school_id = $school->id;
            $user->first_name = 'Mwaka';
            $user->last_name = 'Ambrose';
            $user->username = 'ambrose';
            $user->email = 'ambrose@ambrose.pro';
            $user->gender = 'Male';
            $user->password = bcrypt('secret');
            $user->save();
        }
    }
}
