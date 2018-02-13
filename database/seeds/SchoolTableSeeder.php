<?php

use App\Models\User;
use App\Models\Admin;
use App\Models\School;
use Illuminate\Database\Seeder;

class SchoolTableSeeder extends Seeder
{
    public function run()
    {
        foreach (['Primary School Demo', 'Secondary School Demo'] as $school_name) {
            $new_school = School::create([
                'name' => $school_name,
                'slug' => str_slug($school_name)
            ]);

            $school_id = School::where('slug', str_slug($school_name))->first()->id;

            $admin = new Admin([
                'school_id' => $school_id,
                'name'      => $school_name,
                'username'  => str_slug($school_name)
            ]);

            if ($admin->save() && $new_school->save()) {
                $admin_id  = Admin::where('username', str_slug($school_name))->first()->id;

                User::create([
                    'school_id'     => $school_id,
                    'username'      => str_slug($school_name),
                    'password'      => bcrypt('password'),
                    'userable_id'   => $admin_id,
                    'userable_type' => 'Admin',
                    'first_name'    => 'Ojok',
                    'last_name'    => 'Justine',
                ]);
            }
        }
    }
}
