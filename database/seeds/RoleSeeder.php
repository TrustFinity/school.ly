<?php

use App\Models\Entrust\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Role::ROLES as $name => $description) {
        	$new_role = new Role();
        	$new_role->name = $name;
        	$new_role->slug = str_slug($name);
        	$new_role->description = $description;
        	$new_role->save();
        }
    }
}
