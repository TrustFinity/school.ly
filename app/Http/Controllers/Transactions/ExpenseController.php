<?php

namespace App\Http\Controllers\Transactions;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transactions\Expense;
use App\Models\Settings\Accounts\GeneralLedgerAccounts;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenses = Expense::with(['expense_gla', 'asset_gla'])->paginate(15);
        return view('transactions.expenses.index', compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $assets = GeneralLedgerAccounts::assets();
        $expenses = GeneralLedgerAccounts::expenses();
        return view('transactions.expenses.new', compact('expenses', 'assets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $source = GeneralLedgerAccounts::find($request->source_asset_account_id);
        if ($source->balance < $request->amount) {
            flash($source->name.' doesnt have enough balance to complete the transaction')->error();
            return back();
        }
        $new_expense = new Expense($request->all());
        $new_expense->school_id = Auth::user()->school_id;
        if (!$new_expense->saveTransaction()) {
            flash('Failed to create the expense record.')->error();
            return back();
        }
        $new_expense->asset_gla->decreaseBalance($new_expense->amount);
        $new_expense->expense_gla->increaseBalance($new_expense->amount);
        flash('Expense successfully added, thank you.')->success();
        return redirect('/transactions/expenses');
    }

    /**
     * Display the specified resource.
     *
     * @param Expense|Expense $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Expense|Expense $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Expense|Expense $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {}

    /**
     * Remove the specified resource from storage.
     *
     * @param Expense|Expense $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {}
}
