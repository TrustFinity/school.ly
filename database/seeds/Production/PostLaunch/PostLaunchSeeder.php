<?php

use Illuminate\Database\Seeder;

class PostLaunchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//Terms doesn't have any effect whether run
    	//several times. Perform checks in yours if 
    	//it only needs to be run once
        $this->call(TermSeeder::class);
    }
}
