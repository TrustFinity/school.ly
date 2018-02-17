<?php
namespace App\EntrustMe;

use App\Models\Entrust\Role;
use Illuminate\Routing\Router;

class AutoPermit
{
	protected $router;
	protected $user_roles;

	public function __construct($roles)
	{
		$this->router = app('router');
		$this->user_roles = $roles;
	}

	public function grantAccess()
	{
		foreach ($this->user_roles as $role) {
			foreach ($role->resources as $authorized_resource) {
				// check if the requested uri contains any authorized
				// resource name. If so, return true.
				// PLease note that this is case sensintive. Not that it matter
				// because all route uri's are lower case, so make sure the resources 
				// being seeded are lower case too.
				if (stripos($this->router->getCurrentRoute()->uri, $authorized_resource->name) === 0) {
					return true;
				}
			}
		}
		return false;
	}
}