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
        $user = new \App\Models\User();
        $user->school_id =\App\School::first()->id;
        $user->first_name = 'Mwaka';
        $user->last_name = 'Ambrose';
        $user->username = 'ambrose';
        $user->email = 'ambrose@ambrose.pro';
        $user->gender = 'Male';
        $user->password = bcrypt('secret');
        $user->save();
    }
}
