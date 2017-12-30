<?php

namespace App;

use App\Scopes\SchoolScope;
use Illuminate\Database\Eloquent\Model;

class GeneralLedgerAccounts extends Model
{
    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new SchoolScope());
    }
}
