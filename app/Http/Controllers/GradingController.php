<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Grading  $grading
     * @return \Illuminate\Http\Response
     */
    public function show(Grading $grading)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Grading  $grading
     * @return \Illuminate\Http\Response
     */
    public function edit(Grading $grading)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Grading  $grading
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grading $grading)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Grading  $grading
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grading $grading)
    {
        //
    }
}
