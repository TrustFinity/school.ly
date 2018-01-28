<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Settings\Setting;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('create', 'store');
    }

    public function index()
    {
        $preferences = Auth::user()->school->preferences;
        return view('preference.edit', compact('preferences'));
    }

    public function create()
    {
        if ((Auth::user()->school->preferences === null) || (Auth::user()->school->classGroups->count() === 0)) {
            $school = Auth::user()->school;
            return view('preference.create', compact('school'));
        }

        $preferences = Auth::user()->school->preferences;
        return view('preference.edit', compact('preferences'));
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
