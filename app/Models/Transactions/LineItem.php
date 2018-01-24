<?php

namespace App\Models\Transactions;

use App\Models\School;
use App\Scopes\SchoolScope;
use Illuminate\Database\Eloquent\Model;
use App\Models\Settings\Accounts\GeneralLedgerAccounts;

class LineItem extends Model
{
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new SchoolScope());
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function journal_entry()
    {
        return $this->belongsTo(JournalEntry::class);
    }

    public function gla()
    {
        return $this->belongsTo(GeneralLedgerAccounts::class);
    }
}
