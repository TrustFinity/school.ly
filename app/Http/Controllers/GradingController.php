<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Requests\StoreGrading;
use App\Models\Examinations\Grading;

class GradingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gradings = Grading::all();
        return view('examinations.grading.index', compact('gradings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGrading $request)
    {
        $grading = new Grading($request->all());
        $grading->school_id = Auth::user()->school_id;
        if (!$grading->save()) {
            flash('Failed to create the grade.')->error();
            return back();
        }
        flash('Grade added Successfully.')->success();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Grading  $grading
     * @return \Illuminate\Http\Response
     */
    public function show(Grading $grading)
    {}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Grading  $grading
     * @return \Illuminate\Http\Response
     */
    public function edit(Grading $grading)
    {
        return view('examinations.grading.edit', compact('grading'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Grading  $grading
     * @return \Illuminate\Http\Response
     */
    public function update(StoreGrading $request, Grading $grading)
    {
        if (!$grading->update($request->all())) {
            flash('Failed to update the grade.')->error();
        }
        flash('Successfully updated the grade.')->success();
        return redirect('/gradings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Grading  $grading
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grading $grading)
    {
        if (!$grading->delete()) {
            flash('Failed to delete the grade.')->error();
            return back();
        }
        flash('Successfully deleted the grade.')->success();
        return back();
    }
}
