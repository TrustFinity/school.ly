<?php

namespace App\Models\Classes;

use Illuminate\Database\Eloquent\Model;

class Classgroup extends Model
{
    protected $guarded = [];


    public function classrooms()
    {
        return $this->hasMany(Classroom::class);
    }
}
