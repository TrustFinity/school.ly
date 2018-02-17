<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Classes\Level;
use App\Models\Classes\ClassGroup;

class ClassGroupController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'entrust']);
    }
    
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
        $levels = Level::all();
        return view('class-groups.create', compact('levels'));
    }

    /**
     * Store a newly created resource in storage.
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     */
    public function store(Request $request)
    {
        $classgroup = new ClassGroup($request->all());
        $classgroup->school_id = Auth::user()->school_id;
        if (!$classgroup->save()){
            flash("Failed to create ".$classgroup->name)->error();
            return back();
        }
        flash("Successfully created ".$classgroup->name)->success();
        return redirect('/class-groups');
    }

    /**
     * Display the specified resource.
     *
     * @param ClassGroup|\App\Models\ClassGroup $class_group
     * @return \Illuminate\Http\Response
     */
    public function show(ClassGroup $class_group)
    {}

    /**
     * Show the form for editing the specified resource.
     *
     * @param ClassGroup|\App\Models\ClassGroup $class_group
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassGroup $class_group)
    {
        $levels = Level::all();
        return view('class-groups.edit', compact('class_group', 'levels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ClassGroup|\App\Models\ClassGroup $class_group
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     */
    public function update(ClassGroup $class_group)
    {
        $input = request(['name', 'level_id']);
        $class_group->fill($input)->save();
        return redirect('/class-groups');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ClassGroup|\App\Models\ClassGroup $class_group
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassGroup $class_group)
    {
        if ($class_group->streams->count() > 0){
            flash("Cannot delete ".$class_group->name.", it has streams. Delete the streams first.")->error();
            return back();
        }
        if(!$class_group->delete()){
            flash("Failed to delete ".$class_group->name)->error();
            return back();
        }
        flash("Successfully created ".$class_group->name)->success();
        return redirect('/class-groups');
    }
}
