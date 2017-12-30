<?php

namespace App\Models\Settings;

use App\School;
use App\Scopes\SchoolScope;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{

    protected $fillable = [
        'institution_type',
        'lower_grade_level',
        'upper_grade_level',
        'instructors_type',
        'attendants_type',
    ];
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
}
