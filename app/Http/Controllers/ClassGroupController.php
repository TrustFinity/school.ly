<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes\ClassGroup;

class ClassGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $class_groups = ClassGroup::all();
        return view('class-groups.index', compact('class_groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('class-groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        ClassGroup::create(request(['name']));
        return redirect('/class-groups');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClassGroup  $class_group
     * @return \Illuminate\Http\Response
     */
    public function show(ClassGroup $class_group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClassGroup  $class_group
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassGroup $class_group)
    {
        return view('class-groups.edit', compact('classgroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClassGroup  $class_group
     * @return \Illuminate\Http\Response
     */
    public function update(ClassGroup $class_group)
    {
        $input = request(['name']);
        $class_group->fill($input)->save();

        return redirect('/class-groups');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClassGroup  $class_group
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassGroup $class_group)
    {
        $class_group->delete();
        return redirect('/class-groups');
    }
}
