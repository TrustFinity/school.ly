<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Settings\Setting;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('create', 'store');
    }

    public function create()
    {
        return view('preference.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $preferences = Auth::user()->school->preferences;
        return view('preference.edit', compact('preferences'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Setting|\App\Setting $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        $setting->update($request->all());
        return redirect()->back();
    }
}
