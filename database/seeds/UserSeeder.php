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
        $user->school_id =\App\Models\School::first()->id;
        $user->first_name = 'Mwaka';
        $user->last_name = 'Ambrose';
        $user->username = 'ambrose';
        $user->email = 'ambrose@ambrose.pro';
        $user->gender = 'Male';
        $user->password = bcrypt('secret');
        $user->save();

        $new_user = new \App\Models\User();
        $new_user->school_id =\App\Models\School::first()->id;
        $new_user->first_name = 'Piru';
        $new_user->last_name = 'Pius';
        $new_user->username = 'pius';
        $new_user->email = 'piruville@gmail.com';
        $new_user->gender = 'Male';
        $new_user->password = bcrypt('password');
        $new_user->save();
    }
}
