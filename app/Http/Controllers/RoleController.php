<?php

namespace App\Http\Controllers;

use App\Models\Entrust\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$roles = Role::all();
    	return view('entrust.roles.index', compact('roles'));
    }
}