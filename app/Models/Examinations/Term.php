<?php

namespace App\Models\Examinations;

use App\Models\School;
use App\Scopes\SchoolScope;
use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    const TERMS = [
    	'One', 'Two', 'Three'
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

    public function examinations()
    {
        return $this->hasMany(Term::class);
    }
}