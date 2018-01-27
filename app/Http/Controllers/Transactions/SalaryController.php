<?php

namespace App\Http\Controllers\Transactions;

use Auth;
use App\Models\SupportStaff;
use Illuminate\Http\Request;
use App\Models\Transactions\Salary;
use App\Http\Controllers\Controller;
use App\Models\Settings\Accounts\GeneralLedgerAccounts;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salaries = Salary::with(['support_staff', 'liability_gla', 'asset_gla'])
            ->orderBy('id', 'desc')
            ->paginate(50);
        return view('transactions.salaries.index', compact('salaries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $payment_methods = Salary::PAYMENT_METHODS;
        $support_staff = SupportStaff::all();
        $assets = GeneralLedgerAccounts::assets();
        $liabilities = GeneralLedgerAccounts::liabilities();
        return view('transactions.salaries.new', compact(
            'assets',
            'liabilities',
            'support_staff',
            'payment_methods'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $salary = new Salary($request->all());
        $salary->school_id = Auth::user()->school_id;
        if (!$salary->saveTransaction()){
            flash("Failed to save the new salary payment record")->error()->important();
            return back();
        }
        $salary->asset_gla->decreaseBalance($salary->amount);
        $salary->liability_gla->increaseBalance($salary->amount);
        flash("Salary payment record saved successfully")->success();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function show(Salary $salary)
    {}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function edit(Salary $salary)
    {}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Salary $salary)
    {}

    /**
     * Remove the specified resource from storage.
     *
     * @param  Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salary $salary)
    {}
}
