<?php

namespace App\Http\Controllers;

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
    public function store()
    {
        Stream::create(request(['name', 'class_group_id']));
        return redirect('/streams');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Classes\Stream  $stream
     * @return \Illuminate\Http\Response
     */
    public function show(Stream $stream)
    {
        //
    }

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
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Classes\Stream  $stream
     * @return \Illuminate\Http\Response
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
        $stream->delete();

        return redirect('/streams');
    }
}
