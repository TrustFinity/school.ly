<?php

namespace App\Http\Controllers;

use App\Models\Entrust\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'entrust']);
    }

    public function index()
    {
    	$roles = Role::with('resources')->get();
    	return view('entrust.roles.index', compact('roles'));
    }
}