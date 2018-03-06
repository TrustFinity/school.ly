<?php

namespace App\Models;

use App\Scopes\SchoolScope;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new SchoolScope());
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function examination()
    {
        return $this->belongsTo(Examination::class);
    }
}
