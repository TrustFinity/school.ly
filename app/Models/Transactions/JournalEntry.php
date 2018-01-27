<?php

namespace App\Models\Transactions;

use App\Models\User;
use App\Models\School;
use App\Scopes\SchoolScope;
use Illuminate\Database\Eloquent\Model;

class JournalEntry extends Model
{
    public static function make($user, $transaction_type, $amount)
    {
        $journal_entry = new JournalEntry();
        $journal_entry->amount = $amount;
        $journal_entry->user_id = $user->id;
        $journal_entry->school_id = $user->school_id;
        $journal_entry->transaction_type = $transaction_type;
        return $journal_entry;
    }

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new SchoolScope());
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
