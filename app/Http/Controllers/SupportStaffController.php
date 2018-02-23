<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\SupportStaff;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSupportStaff;
use App\Http\Requests\StoreProfilePhoto;

class SupportStaffController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'entrust']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $support_staffs = SupportStaff::orderBy('id', 'desc')->paginate(20);
        return view('support-staffs.index', compact('support_staffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $support_staff = new SupportStaff;
        return view('support-staffs.new', compact('support_staff'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSupportStaff $request)
    {
        $support_staff = new SupportStaff($request->all());
        $support_staff->school_id = Auth::user()->school_id;
        $support_staff->search_term = $support_staff->constructSearchTerm();
        if (!$support_staff->save()) {
            flash('Failed to save support staff data')->error()->important();
            return back();
        }
        flash($support_staff->name.' data created successfuly.')->success();
        return redirect('/support-staff');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SupportStaff  $supportStaff
     * @return \Illuminate\Http\Response
     */
    public function show(SupportStaff $supportStaff)
    {}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SupportStaff  $supportStaff
     * @return \Illuminate\Http\Response
     */
    public function edit(SupportStaff $support_staff)
    {
        return view('support-staffs.edit', compact('support_staff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SupportStaff  $supportStaff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SupportStaff $support_staff)
    {
        if (!$support_staff->update($request->all())) {
            flash('Failed to update '.$support_staff->name .'\'s data.')->error()->important();
            return back()->withErrors($support_staff->errors);
        }
        flash('Successfully updated '.$support_staff->name .'\'s data.')->success();
        return redirect('/support-staff');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SupportStaff  $supportStaff
     * @return \Illuminate\Http\Response
     */
    public function destroy(SupportStaff $supportStaff)
    {}

    public function showPhotoEditForm(Request $request, SupportStaff $support_staff)
    {
        $resource = $support_staff;
        $resource_type = 'support-staff';
        return view('shared.edit_photos', compact('resource', 'resource_type'));
    }

    public function editPhoto(StoreProfilePhoto $request, SupportStaff $support_staff)
    {
        $image_name = $support_staff->photo_url ?? str_slug($support_staff->name).time().".jpg";
        $image = $request->file('photo_url');
        $destination_path = public_path('/storage/photos');
        $image->move($destination_path, $image_name);
        $support_staff->photo_url = $support_staff->photo_url ?? '/storage/photos/'.$image_name;
        $support_staff->save();

        flash('Updated '.$support_staff->name.' photo.')->success();
        return redirect('/support-staff');
    }
}
