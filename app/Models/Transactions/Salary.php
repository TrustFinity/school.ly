<?php

namespace App\Models\Transactions;

use Auth;
use App\Models\School;
use App\Models\Teacher;
use App\Scopes\SchoolScope;
use App\Models\SupportStaff;
use App\Models\Transactions\Helpers\Transaction;
use App\Models\Transactions\Helpers\TransactionType;
use App\Models\Settings\Accounts\GeneralLedgerAccounts;
use App\Models\Transactions\Helpers\Contracts\Transactable;

class Salary extends Transaction implements Transactable
{
    const PAYMENT_METHODS = [
        'Cash',
        'Cheque',
    ];

    protected $dates = ['month'];

    protected $fillable = [
       'support_staff_id',
       'teacher_id',
       'liability_account_id',
       'source_asset_account_id',
       'payment_method',
       'month',
       'amount',
       'receipt_number',
       'cheque_number',
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

    public function liability_gla()
    {
        return $this->belongsTo(GeneralLedgerAccounts::class, 'liability_account_id');
    }

    public function asset_gla()
    {
        return $this->belongsTo(GeneralLedgerAccounts::class, 'source_asset_account_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function support_staff()
    {
        return $this->belongsTo(SupportStaff::class);
    }

    public function transactionType()
    {
        return TransactionType::SALARY_TYPE;
    }

    public function amount()
    {
        return $this->amount;
    }

    public function debitRecord()
    {
        $debit_records = array();
        $debit_record = new LineItem();
        $debit_record->general_ledger_account_id = $this->liability_account_id;
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
