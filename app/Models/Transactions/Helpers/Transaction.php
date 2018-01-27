<?php

namespace App\Models\Transactions\Helpers;


use Auth;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transactions\JournalEntry;

class Transaction extends Model
{
    public $credit_records = array();
    public $debit_record   = array();

    public function saveTransaction()
    {
        $user = Auth::user();
        $journal_entry = JournalEntry::make($user, $this->transactionType(), $this->amount());

        if (!$this->save()) {
            $this->recoverFromFailedSave();
            return false;
        }

        if (!$journal_entry->save()) {
            $this->recoverFromFailedJournalEntry();
            return false;
        }

        if (!$this->makeLineItems($journal_entry)) {
            $this->recoverFromFailedLineItems();
            return false;
        }
        return true;
    }

    private function recoverFromFailedSave()
    {

    }

    private function recoverFromFailedJournalEntry()
    {

    }

    private function makeLineItems($journal_entry)
    {
        $line_items = array_merge($this->debitRecord(), $this->creditRecord());
        foreach ($line_items as $line_item){
            $line_item->journal_entry_id = $journal_entry->id;
            if (!$line_item->save()){
                return false;
            }
        }
        return true;
    }

    private function recoverFromFailedLineItems()
    {

    }
}