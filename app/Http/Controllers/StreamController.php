<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Classes\Stream;
use App\Models\Classes\ClassGroup;

class StreamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $streams = Stream::all()->load('classGroup');
        return view('streams.index', compact('streams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $class_groups = ClassGroup::all();
        return view('streams.create', compact('class_groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $stream = new Stream($request->all());
        $stream->school_id = Auth::user()->school_id;
        if (!$stream->save()){
            flash('Failed to create '.$stream->name)->error();
            return back();
        }
        flash('Created '.$stream->name. ' stream')->success();
        return redirect('/streams');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Classes\Stream  $stream
     * @return \Illuminate\Http\Response
     */
    public function show(Stream $stream)
    {}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Classes\Stream  $stream
     * @return \Illuminate\Http\Response
     */
    public function edit(Stream $stream)
    {
        $class_groups = ClassGroup::all();
        return view('streams.edit', compact('class_groups', 'stream'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Classes\Stream $stream
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     */
    public function update(Stream $stream)
    {
        $input = request(['name', 'class_group_id']);
        $stream->fill($input)->save();
        return redirect('/streams');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Classes\Stream  $stream
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stream $stream)
    {
        if ($$stream->delete()){
            flash('Failed to delete '.$stream->name)->error();
            return back();
        }
        flash('Deleted '.$stream->name)->success();
        return redirect('/streams');
    }
}
