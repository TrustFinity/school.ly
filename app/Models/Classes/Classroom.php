<?php

namespace App\Models\Classes;

use App\Scopes\SchoolScope;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
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

    public function classgroup()
    {
        return $this->belongsTo(Classgroup::class, 'classgroup_id');
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function teacher()
    {
        return $this->hasOne(Teacher::class);
    }
}
