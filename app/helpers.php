<?php

function daysInWeek()
{
    return ['Mon', 'Tue', 'Wed', 'Thur', 'Fri', 'Sat', 'Sun'];
}

function shortDate($date)
{
    return date("Y-m-d", strtotime($date));
}

function getClass(string $alias)
{
    return [
       's'    => App\Models\School::class,
       'set'  => App\Models\Settings\Setting::class,

       'u'    => App\Models\User::class,
       'a'    => App\Models\Admin::class,
       't'    => App\Models\Teacher::class,
       'st'   => App\Models\Student::class,

       'cg'   => App\Models\Classes\ClassGroup::class,
       'str'  => App\Models\Classes\Stream::class,
       'l'    => App\Models\Classes\Level::class,
       'sb'   => App\Models\Classes\Subject::class,
       'sa'   => App\Models\Attendances\Attendance::class,

       'e'   => App\Models\Examinations\Examination::class,
       't'   => App\Models\Examinations\Term::class,
       'r'   => App\Models\Examinations\Result::class,

    ][$alias];
}

function dgc(string $alias)
{
    return getClass($alias);
}

function dgf(string $alias)
{
    return getClass($alias)::first();
}

function dgl(string $alias)
{
    return getClass($alias)::all()->last();
}

function ulogin()
{
    return Auth::login(dgf('u'));
}

function dga(string $alias)
{
    return getClass($alias)::all();
}

function dgo(string $alias, int $id)
{
    return getClass($alias)::find($id);
}

function instance($class)
{
    $class = getClass($class);
    return (new $class);
}

function inProduction()
{
    return env('APP_ENV') === PRODUCTION_ENVIRONMENT;
}

function getPreference()
{
    return App\Models\Settings\Setting::all()->first();
}

function school_name()
{
    return \Auth::user()->school->name;
}

function logged_in_lastname()
{
    return \Auth::user()->last_name;
}

function slugify($str)
{
    $search = ['', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''];
    $replace = ['s', 't', 's', 't', 's', 't', 's', 't', 'i', 'a', 'a', 'i', 'a', 'a', 'e', 'E'];
    $str = str_ireplace($search, $replace, strtolower(trim($str)));
    $str = preg_replace('/[^\w\d\-\ ]/', '', $str);
    $str = str_replace(' ', '-', $str);
    return $str;
}

/**
 * Build a tree from a given set off arrays. This is not my original
 * work, it just happend to be exactly what I wanted to build
 * for gla tree traversing.
 * @credit https://stackoverflow.com/questions/8840319/build-a-tree-from-a-flat-array-in-php
 * @param  array   &$elements starting point if building the tree.
 * @param  integer $parentId  parent id of the current element being built.
 * @return array             the multi nested array simulating the tree.
 */
function buildTree(array &$elements, $parentId = 0)
{
    $branch = [];
    foreach ($elements as $element) {
        if ($element['parent_id'] == $parentId) {
            $children = buildTree($elements, $element['id']);
            if ($children) {
                $element['children'] = $children;
            }
            $branch[$element['id']] = $element;
            unset($elements[$element['id']]);
        }
    }
    return $branch;
}

function todaysDate()
{
    return \Carbon\Carbon::now()->toFormattedDateString();
}

function grade($value)
{
    switch ($value) {
        case $value < getPreference()->lower_grade_level:
            $grade = 'F9';
            break;
        case $value > getPreference()->upper_grade_level || $value == getPreference()->upper_grade_level:
            $grade = 'D1';
            break;
        default:
            $grade = 'C3';
            break;
    }
    return $grade;
}
