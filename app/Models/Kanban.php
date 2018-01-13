<?php

namespace App\Models;

use App\Scopes\SchoolScope;
use App\Models\Classes\Subject;
use App\Models\Classes\Classgroup;
use Illuminate\Database\Eloquent\Model;

class Kanban extends Model
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

    public function school()
    {
        return $this->belongsTo(School::class);
    }
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function classgroup()
    {
        return $this->belongsTo(Classgroup::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
