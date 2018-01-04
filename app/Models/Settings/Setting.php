<?php

namespace App\Models\Settings;

use App\Models\School;
use App\Scopes\SchoolScope;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'school_id',
        'institution_type',
        'lower_grade_level',
        'upper_grade_level',
        'instructors_type',
        'attendants_type',
    ];

    public function rules()
    {
        return [
            'institution_type'  => 'required|string',
            'lower_grade_level' => 'sometimes|string',
            'upper_grade_level' => 'sometimes|string',
            'instructors_type'  => 'sometimes|string',
            'attendants_type'   => 'sometimes|string',
        ];
    }

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
