<?php

namespace App\Models\Classes;

use App\Scopes\SchoolScope;
use Illuminate\Database\Eloquent\Model;

class Classgroup extends Model
{
    protected $guarded = [];

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

    public function classrooms()
    {
        return $this->hasMany(Classroom::class);
    }
}
