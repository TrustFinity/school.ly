<?php

namespace Tests\Traits;

use Auth;
use App\Models\User;
use App\Models\Entrust\Role;

trait TestTrait {

	public $user;

	// Traits cannot have constants. TODO MA. User this as reference for slugs
	// to be passed in.
	
	// const DIRECTOR = 'director';
	// const HEADTEACHER = 'headteacher';
	// const DEPUTY_HEADTEACHER = 'deputy-headteacher';
	// const ADMINISTRATOR = 'administrator';
	// const DOS = 'director-of-studies';
	// const BUSASR = 'busar';
	// const TEACHER = 'teacher';
	// const SUPPORT_STAFF = 'support-staff';
	// const IT = 'it';
	// const STUDENT = 'student';

	public function actAs($role_slug)
	{
		Auth::logout();
		$role = Role::where('slug', $role_slug)->first();
		$user = User::first();
		$user->roles()->sync($role->id);
		$this->user = $user;

		Auth::login($this->user);
	}

	public function actAsDirector()
	{
		Auth::logout();
		$role = Role::where('slug', 'director')->first();
		$user = User::first();
		$user->roles()->sync($role->id);
		$this->user = $user;

		Auth::login($this->user);
	}

	public function actAsDOS()
	{
		Auth::logout();
		$role = Role::where('slug', 'director-of-studies')->first();
		$user = User::first();
		$user->roles()->sync($role->id);
		$this->user = $user;

		Auth::login($this->user);
	}

	public function actAsTeacher()
	{
		Auth::logout();
		$role = Role::where('slug', 'teacher')->first();
		$user = User::first();
		$user->roles()->sync($role->id);
		$this->user = $user;

		Auth::login($this->user);
	}

	public function user()
	{
		return $this->user;
	}
}