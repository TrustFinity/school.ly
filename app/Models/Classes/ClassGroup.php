<?php

namespace App\Models\Classes;

use App\Scopes\SchoolScope;
use Illuminate\Database\Eloquent\Model;

class ClassGroup extends Model
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

    public function streams()
    {
        return $this->hasMany(Stream::class);
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
}
