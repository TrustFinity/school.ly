<?php

namespace App\Models\Transactions;

use Auth;
use App\Models\School;
use App\Models\Transactions\Helpers\Contracts\Transactable;
use App\Models\Transactions\Helpers\Transaction;
use App\Models\Transactions\Helpers\TransactionType;
use App\Scopes\SchoolScope;
use Illuminate\Database\Eloquent\Model;
use App\Models\Settings\Accounts\GeneralLedgerAccounts;

class Expense extends Transaction implements Transactable
{
    const PAYMENT_METHODS = [
    	'Cash',
        'Cheque',
    ];

    protected $fillable = [
    	'payment_method',
    	'expense_account_id',
        'source_asset_account_id',
        'amount',
        'receipt_number',
        'cheque_number',
        'description',
    ];

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new SchoolScope());
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function expense_gla()
    {
    	return $this->belongsTo(GeneralLedgerAccounts::class, 'expense_account_id');
    }

    public function asset_gla()
    {
    	return $this->belongsTo(GeneralLedgerAccounts::class, 'source_asset_account_id');
    }

    public function transactionType()
    {
        return TransactionType::EXPENSE_TYPE;
    }

    public function amount()
    {
        return $this->amount;
    }

    public function debitRecord()
    {
        $debit_records = array();
        $debit_record = new LineItem();
        $debit_record->general_ledger_account_id = $this->expense_account_id;
        $debit_record->school_id = Auth::user()->school_id;
        $debit_record->debit_record = $this->amount;
        $debit_records[] =  $debit_record;


        return $debit_records;
    }

    public function creditRecord()
    {
        $credit_records = array();
        $credit_record = new LineItem();
        $credit_record->general_ledger_account_id = $this->source_asset_account_id;
        $credit_record->school_id = Auth::user()->school_id;
        $credit_record->credit_record = $this->amount;
        $credit_records[] = $credit_record;


        return $credit_records;
    }
}