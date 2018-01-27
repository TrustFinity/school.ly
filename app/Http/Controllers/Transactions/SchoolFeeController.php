<?php

namespace App\Http\Controllers\Transactions;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transactions\SchoolFee;
use App\Models\Settings\Accounts\GeneralLedgerAccounts;

class SchoolFeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $school_fees = SchoolFee::with(['student', 'equity_gla', 'asset_gla'])
                            ->orderBy('id', 'desc')
                            ->paginate(50);
        return view('transactions.school-fees.index', compact('school_fees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::with(['stream'])->get();
        $assets = GeneralLedgerAccounts::assets();
        $equity = GeneralLedgerAccounts::equity();
        return view('transactions.school-fees.new', compact('assets', 'equity', 'students'));
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
     * @param  SchoolFee  $schoolFee
     * @return \Illuminate\Http\Response
     */
    public function show(SchoolFee $schoolFee)
    {}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  SchoolFee  $schoolFee
     * @return \Illuminate\Http\Response
     */
    public function edit(SchoolFee $schoolFee)
    {}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  SchoolFee  $schoolFee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SchoolFee $schoolFee)
    {}

    /**
     * Remove the specified resource from storage.
     *
     * @param  SchoolFee  $schoolFee
     * @return \Illuminate\Http\Response
     */
    public function destroy(SchoolFee $schoolFee)
    {}
}
