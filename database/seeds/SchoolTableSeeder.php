<?php

use App\Models\User;
use App\Models\Admin;
use App\Models\School;
use Illuminate\Database\Seeder;

class SchoolTableSeeder extends Seeder
{
    //todo clean this up and create a second school

    public function run()
    {
        $school_name = 'School Demo';
        $email       = 'test@gmail.com';

        $admin = new Admin([
            'name'      => $school_name,
            'username'  => str_slug($school_name)
        ]);

        if ($admin->save()) {
            $admin_id = Admin::where('username', str_slug($school_name))->first()->id;

            User::create([
                'name'          => str_slug($school_name),
                'email'         => $email,
                'password'      => bcrypt('password'),
                'userable_id'   => $admin_id,
                'userable_type' => 'Admin'
            ]);

            $user_id = User::where('userable_id', $admin_id)->first()->id;

            $new_school = School::create([
                'name'          => $school_name,
                'super_user_id' => $user_id
            ]);
        }
    }
}
