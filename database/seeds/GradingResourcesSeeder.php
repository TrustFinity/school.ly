<?php

use App\Models\Entrust\Role;
use Illuminate\Database\Seeder;
use App\Models\Entrust\SystemResource;

class GradingResourcesSeeder extends Seeder
{
	const RESOURCE_NAME = 'grading';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	if (!$this->checkIfExists()) {

    		echo "Seeding ".self::RESOURCE_NAME. "\n";

	        $resource = new SystemResource;
	    	$resource->name = self::RESOURCE_NAME;
	    	$resource->save();

	    	// Add to appropriate roles.
	    	Role::where('name', Role::DIRECTOR)
	    		  ->first()
                  ->resources()
                  ->syncWithoutDetaching($resource->id);
            Role::where('name', Role::HEADTEACHER)
	    		  ->first()
                  ->resources()
                  ->syncWithoutDetaching($resource->id);
            Role::where('name', Role::DOS)
	    		  ->first()
                  ->resources()
                  ->syncWithoutDetaching($resource->id);

	    	echo "Seeded ".self::RESOURCE_NAME ."\n\n";
	    	return;
    	}
		echo self::RESOURCE_NAME. " already seeded. Skipping the seeder. \n";

    }

    public function checkIfExists()
    {
    	if (!SystemResource::where('name', self::RESOURCE_NAME)->first()) {
    		return false;
    	}
    	return true;
    }
}
