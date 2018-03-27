<?php

namespace App\DarasiniFactories;

use App\Models\Examinations\Grading;

class DefualtGrading
{
	public static function seed($school_id)
	{
		$_0_39 = new Grading([
    		'minimum_range' => 0,
    		'maximum_range' => 39,
    		'grade' => 'F9'
    	]);
    	$_0_39->school_id = $school_id;
    	$_0_39->save();


    	$_40_44 = new Grading([
    		'minimum_range' => 40,
    		'maximum_range' => 44,
    		'grade' => 'P8'
    	]);
    	$_40_44->school_id = $school_id;
    	$_40_44->save();

    	$_45_49 = new Grading([
    		'minimum_range' => 45,
    		'maximum_range' => 49,
    		'grade' => 'P7'
    	]);
    	$_45_49->school_id = $school_id;
    	$_45_49->save();

    	$_50_54 = new Grading([
    		'minimum_range' => 50,
    		'maximum_range' => 54,
    		'grade' => 'C6'
    	]);
    	$_50_54->school_id = $school_id;
    	$_50_54->save();

    	$_55_59 = new Grading([
    		'minimum_range' => 55,
    		'maximum_range' => 59,
    		'grade' => 'C5'
    	]);
    	$_55_59->school_id = $school_id;
    	$_55_59->save();

    	$_60_64 = new Grading([
    		'minimum_range' => 60,
    		'maximum_range' => 64,
    		'grade' => 'C4'
    	]);
    	$_60_64->school_id = $school_id;
    	$_60_64->save();

    	$_65_69 = new Grading([
    		'minimum_range' => 65,
    		'maximum_range' => 69,
    		'grade' => 'C3'
    	]);
    	$_65_69->school_id = $school_id;
    	$_65_69->save();

    	$_70_74 = new Grading([
    		'minimum_range' => 70,
    		'maximum_range' => 74,
    		'grade' => 'D2'
    	]);
    	$_70_74->school_id = $school_id;
    	$_70_74->save();

    	$_75_100 = new Grading([
    		'minimum_range' => 75,
    		'maximum_range' => 100,
    		'grade' => 'D1'
    	]);
    	$_75_100->school_id = $school_id;
    	$_75_100->save();
	}
}