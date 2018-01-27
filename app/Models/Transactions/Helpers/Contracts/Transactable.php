<?php

namespace App\Models\Transactions\Helpers\Contracts;

interface Transactable
{
    public function transactionType();
    public function amount();
    public function debitRecord();
    public function creditRecord();
}