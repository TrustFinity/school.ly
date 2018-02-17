<?php

use App\Models\User;
use App\Models\Admin;
use App\Models\School;
use App\Models\Entrust\Role;
use Illuminate\Database\Seeder;

class SchoolTableSeeder extends Seeder
{
    public function run()
    {
        foreach (['Secondary School'] as $school_name) {
            
            $school = School::create([
                'name' => $school_name,
                'slug' => str_slug($school_name)
            ]);

            // Create a couple of users.
            User::create([
                'school_id'     => $school->id,
                'username'      => str_slug('ambrose'),
                'password'      => bcrypt('secret'),
                'first_name'    => 'Mwaka',
                'last_name'    => 'Ambrose',
            ]);

            User::create([
                'school_id'     => $school->id,
                'username'      => str_slug('Ojok Justine'),
                'password'      => bcrypt('password'),
                'first_name'    => 'Ojok',
                'last_name'    => 'Justine',
            ]);

            User::create([
                'school_id'     => $school->id,
                'username'      => str_slug($school->name),
                'password'      => bcrypt('password'),
                'first_name'    => 'Ayo',
                'last_name'    => 'Ruth',
            ]);

            foreach (User::all() as $user) {
                $role = Role::inRandomOrder()->first();
                $user->roles()->sync($role->id);
            }

            // Create a director user.
            $user = User::create([
                        'school_id'     => $school->id,
                        'username'      => str_slug('director'),
                        'password'      => bcrypt('secret'),
                        'first_name'    => $school->name,
                        'last_name'    => 'Director',
                    ]);
            $role = Role::where('name', Role::DIRECTOR)->first();
            $user->roles()->sync($role->id);
        }
    }
}
