<?php

use Illuminate\Database\Seeder;

class SupportStaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 40; $i++) { 
        	$support_staff = factory(\App\Models\SupportStaff::class)->make();
        	$support_staff->save();
        }
    }
}
