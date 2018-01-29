<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Models\Classes\Level;
use App\Models\Classes\Subject;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::all();
        return view('subjects.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $levels = Level::all();
        $teachers = Teacher::all();
        return view('subjects.create', compact('levels', 'teachers'));
    }

    /**
     * Store a newly created resource in storage.
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     */
    public function store(Request $request)
    {
        $subject = new Subject($request->all());
        $subject->school_id = Auth::user()->school_id;
        if (!$subject->save()){
            flash("Failed to create ".$subject->name)->error();
            return back();
        }
        flash("Successfully created ".$subject->name)->success();
        return redirect('/subjects');
    }

    /**
     * Display the specified resource.
     *
     * @param Subject $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {}

    /**
     * Show the form for editing the specified resource.
     *
     * @param Subject $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        $levels = Level::all();
        $teachers = Teacher::all();
        return view('subjects.edit', compact('subject', 'levels', 'teachers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Subject $subject
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     */
    public function update(Subject $subject)
    {
        $input = request(['name','level_id','teacher_id']);
        $subject->fill($input);
        $subject->school_id = Auth::user()->school_id;
        $subject->save();
        return redirect('/subjects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Subject $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        if ($subject->students->count() > 0){
            flash("Cannot delete ".$subject->name. ". Its has ".getPreference()->attendants_type." studying it.")->error();
            return back();
        }
        if(!$subject->delete()){
            flash("Failed to delete ".$subject->name)->error();
            return back();
        }
        flash("Successfully deleted ".$subject->name)->success();
        return redirect('/subjects');
    }
}
