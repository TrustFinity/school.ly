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
				// Regex this check to avoid much failure.
				if ($this->router->getCurrentRoute()->uri == $authorized_resource->name) {
					return true;
				}
			}
		}
		return false;
	}
}