<?php

namespace App\Models\Transactions;

use Auth;
use App\Models\School;
use App\Models\Student;
use App\Models\Transactions\Helpers\TransactionType;
use App\Scopes\SchoolScope;
use App\Models\Transactions\Helpers\Transaction;
use App\Models\Settings\Accounts\GeneralLedgerAccounts;
use App\Models\Transactions\Helpers\Contracts\Transactable;

class SchoolFee extends Transaction implements Transactable
{
    const PAYMENT_METHODS = [
        'Bank Slip',
        'Cash'
    ];

    protected $dates = ['year'];

    protected $fillable = [
        'payment_method',
        'equity_account_id',
        'source_asset_account_id',
        'student_id',
        'amount',
        'receipt_number',
        'bank_slip_number',
        'term',
        'year'
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

    public function equity_gla()
    {
        return $this->belongsTo(GeneralLedgerAccounts::class, 'equity_account_id');
    }

    public function asset_gla()
    {
        return $this->belongsTo(GeneralLedgerAccounts::class, 'source_asset_account_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function transactionType()
    {
        return TransactionType::SCHOOL_FEES_TYPE;
    }

    public function amount()
    {
        return $this->amount;
    }

    public function debitRecord()
    {
        $debit_records = array();
        $debit_record = new LineItem();
        $debit_record->general_ledger_account_id = $this->equity_account_id;
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