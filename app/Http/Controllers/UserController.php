<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Entrust\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('settings.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$roles = Role::all();
        return view('settings.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validatorCreation($request->all())->validate();
        $user = new User($request->all());
        $user->school_id = Auth::user()->school_id;
        $user->password  = bcrypt($request->password);
        if (!$user->save()) {
        	flash('Failed to create the user. An error occured')->error();
        	return back();
        }
        // $user->roles()->syncWithoutDetaching($request->role);
        $user->roles()->sync($request->role);
        flash($user->name." has been created successfully.")->success();
        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
    	$roles = Role::all();
    	return view('settings.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
    	$this->validatorUpdate($request->all())->validate();
        if (!$user->update($request->all())) {
        	flash("Failed to update ".$user->name." data. An error occured")->error();
        	return back();
        }
        // $user->roles()->syncWithoutDetaching($request->role);
        $user->roles()->sync($request->role);
        flash($user->name." has been updated successfully.")->success();
        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {}

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validatorCreation(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|max:255|unique:users',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'role' => 'required',
            'gender' => 'required|string',
            'email' => 'nullable|email|max:255',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validatorUpdate(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|max:255',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'role' => 'required',
            'gender' => 'required|string',
            'email' => 'nullable|email|max:255',
        ]);
    }
}
