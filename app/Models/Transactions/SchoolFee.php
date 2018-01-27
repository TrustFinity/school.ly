<?php

namespace App\Models\Transactions;

use App\Models\School;
use App\Scopes\SchoolScope;
use Illuminate\Database\Eloquent\Model;

class SchoolFee extends Model
{
    const PAYMENT_METHODS = [
        'Bank Slips',
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
}