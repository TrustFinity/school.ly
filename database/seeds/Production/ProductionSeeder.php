<?php

use Illuminate\Database\Seeder;

class ProductionSeeder extends Seeder
{
    /********************************************************
     * This should be run only once when the app goes to 
     * production. Please be careful and double check the 
     * environment before running this seed file. If you want
     * to seed something in productions, use the PostLaunchSeeder
     * instead and follow the steps for setting up a post launch 
     * seeder.
     *  
     **/

    public function run()
    {
    	//Systems Resources
        $this->call(SystemResourceSeeder::class);
        // Roles/Permissions
        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
    }
}