<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings\Accounts\GeneralLedgerAccounts;

class GeneralLedgerAccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $type = $request->type ?? 'A';
        $accounts = GeneralLedgerAccounts::loadType($type);
        $accounts = $accounts->toArray();
        $accounts = buildTree($accounts, 0);
        return view('settings.gla.index', compact('accounts', 'type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {}

    /**
     * Display the specified resource.
     *
     * @param  \App\GeneralLedgerAccounts  $chart_of_account
     * @return \Illuminate\Http\Response
     */
    public function show(GeneralLedgerAccounts $chart_of_account)
    {}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GeneralLedgerAccounts  $chart_of_account
     * @return \Illuminate\Http\Response
     */
    public function edit(GeneralLedgerAccounts $chart_of_account)
    {
        return view('settings.gla.edit', compact('chart_of_account'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GeneralLedgerAccounts  $chart_of_account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GeneralLedgerAccounts $chart_of_account)
    {
        if (!$chart_of_account->update($request->all())) {
            flash('Failed to update '.$chart_of_account->name)->error()->important();
            return back();
        }
        flash('Successfully updated '.$chart_of_account->name)->success();
        return redirect('/chart-of-accounts?type='.$chart_of_account->parent_identifier);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GeneralLedgerAccounts  $chart_of_account
     * @return \Illuminate\Http\Response
     */
    public function destroy(GeneralLedgerAccounts $chart_of_account)
    {
        if ($chart_of_account->balance > 0) {
            flash('This account has a balance of '.$chart_of_account->balance.' therefore we cannot delete it.')->error()->important();
            return back();
        }
        if (!$chart_of_account->delete()) {
            flash('Failed to delete '. $chart_of_account->name)->error();
            return back();
        }
        flash('Successfully deleted '.$chart_of_account->name)->success();
        return redirect('/chart-of-accounts?type='.$chart_of_account->parent_identifier);
    }

    /**
     * Show a form for creating a new gla under the 
     * parent shown.
     * @param GeneralLedgerAccounts $general_ledger_accounts [description]
     * @param Request               $request                 [description]
     */
    public function addNewAccount(GeneralLedgerAccounts $general_ledger_accounts, Request $request)
    {
        return view('settings.gla.new', compact('general_ledger_accounts'));
    }

    public function saveNewAccount(GeneralLedgerAccounts $general_ledger_accounts, Request $request)
    {
        $new_gla = GeneralLedgerAccounts::make($request->all());
        $new_gla->parent_identifier = $general_ledger_accounts->parent_identifier;
        $new_gla->parent_id = $general_ledger_accounts->id;
        $new_gla->real_depth = $general_ledger_accounts->real_depth + 1;
        if (!$new_gla->save()) {
            flash('Failed to create '.$new_gla->name)->error();
            return back();
        }
        flash($new_gla->name.' created successfully')->success();
        return redirect('/chart-of-accounts?type='.$general_ledger_accounts->parent_identifier);
    }
}
