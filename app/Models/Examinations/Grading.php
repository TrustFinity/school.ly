<?php

namespace App\Models\Examinations;

use App\Models\School;
use App\Scopes\SchoolScope;
use Illuminate\Database\Eloquent\Model;

class Grading extends Model
{
	protected $fillable = [
		'minimum_range',
		'maximum_range',
		'grade',
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