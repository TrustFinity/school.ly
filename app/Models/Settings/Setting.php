<?php

namespace App\Models\Settings;

use App\Scopes\SchoolScope;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
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
