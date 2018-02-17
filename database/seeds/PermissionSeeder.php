<?php

use App\Models\Entrust\Role;
use Illuminate\Database\Seeder;
use App\Models\Entrust\SystemResource;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (SystemResource::all() as $resource) {
        	Role::first()->resources()->syncWithoutDetaching($resource->id);
        }
    }
}
