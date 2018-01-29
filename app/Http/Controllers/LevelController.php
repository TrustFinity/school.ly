<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Classes\Level;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levels = Level::all();
        return view('levels.index', compact('levels'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     */
    public function store(Request $request)
    {
        $level = new Level();
        $level->school_id = Auth::user()->school_id;
        $level->name = $request->name;
        if (! $level->save()) {
            flash("Failed to create level ".$level->name)->error();
            return back();
        }
        flash($level->name. " created successfully.")->success();
        return redirect('/levels');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Level|\App\Models\Level $level
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     */
    public function update(Level $level)
    {
        $input = request(['name']);
        $level->fill($input)->save();

        return redirect('/levels');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Level|\App\Models\Level $level
     * @return \Illuminate\Http\Response
     */
    public function destroy(Level $level)
    {
        if ($level->students->count() > 0){
            flash("Cannot delete ".$level->name.", it has ".getPreference()->attendants_type)->error();
            return back();
        }
        if (!$level->delete()){
            flash("Failed to delete ".$level->name)->error();
            return back();
        }
        flash("Deleted ".$level->name)->success();
        return redirect('/levels');
    }
}
