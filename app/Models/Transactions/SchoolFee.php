<?php

namespace App\Models\Transactions;

use App\Models\School;
use App\Models\Student;
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
        // TODO: Implement transactionType() method.
    }

    public function amount()
    {
        // TODO: Implement amount() method.
    }

    public function debitRecord()
    {
        // TODO: Implement debitRecord() method.
    }

    public function creditRecord()
    {
        // TODO: Implement creditRecord() method.
    }
}