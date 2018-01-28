<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\School;
use App\Models\Result;
use App\Models\Examination;
use Illuminate\Http\Request;
use App\Http\Requests\StoreExaminationRequest;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $examinations = Examination::all();
        return view('examinations.index', compact('examinations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $examination = new Examination;
        return view('examinations.create', compact('examination'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExaminationRequest $request)
    {
        $new_examination = new Examination($request->all());
        $new_examination->school_id = Auth::user()->school_id;

        if ($new_examination->save()) {
            flash('Expense successfully added, thank you.')->success();
            return redirect('/examinations');
        } else {
            flash('Failed.')->error();
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function show(School $school)
    {
        $examination = Examination::find($id);
        $results = Result::where('examination_id', $id)->get();
        return view('examinations.show', compact('examination', 'results'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function edit(School $school)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, School $school)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function destroy(School $school)
    {
        $examination = Examination::findOrFail($id);

        if ($examination->results()->count() > 0) {
            flash("You cannot delete this $examination->name because it has results attached to it.")->error();
            return redirect("/examinations/$id");
        }

        $examination->delete();

        flash('Record has been successfully deleted.')->success();
        return redirect('/examinations');
    }
}
