<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings\Setting;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('create', 'store');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $preferences = Setting::all()->first();
        return view('preference.create', compact('preferences'));
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
        dd($setting);
    }
}
