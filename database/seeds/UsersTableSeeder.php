<?php

use App\Models\User;
use App\Models\Admin;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //admin users are created when a new school is created
        // Admin::create([
        //     'name'      => 'Piru',
        //     'username'  => 'piru'
        // ]);

        // User::create([
        //     'name' => 'Piru',
        //     'email' => 'piruville@gmail.com',
        //     'password' => bcrypt('password'),
        //     'userable_id' => 1,
        //     'userable_type' => 'Admin'
        // ]);
    }
}
