<?php

use Illuminate\Database\Seeder;
use App\Models\Entrust\SystemResource;

class SystemResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (SystemResource::RESOURCES as $name) {
        	$resource = new SystemResource;
        	$resource->name = $name;
        	$resource->save();
        }
    }
}
