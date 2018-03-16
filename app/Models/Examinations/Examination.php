<?php

namespace App\Models\Examinations;

use App\Scopes\SchoolScope;
use Illuminate\Database\Eloquent\Model;

class Examination extends Model
{

    protected $with = ['term', 'results'];

    protected $dates = [
        'start_date',
        'end_date',
    ];

    protected $fillable = [
        'school_id',
        'name',
        'start_date',
        'end_date',
        'term_id',
    ];

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new SchoolScope());
    }

    public function rules()
    {
        return [
            'name'       => 'required|string|min:4',
            'start_date' => 'required|date',
            'end_date'   => 'required|date',
            'term_id'    => 'required|numeric'   
        ];
    }

    public function results()
    {
        return $this->belongsTo(Result::class);
    }

    public function term()
    {
        return $this->belongsTo(Term::class);
    }
}