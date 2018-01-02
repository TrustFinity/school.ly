<?php

function daysInWeek()
{
    return ['Mon', 'Tue', 'Wed', 'Thur', 'Fri', 'Sat', 'Sun'];
}

function shortDate($date)
{
    return date($date, "Y-m-d");
}

function getClass(string $alias)
{
    return [
       's'  => App\Models\School::class,

       'u'  => App\Models\User::class,
       'a'  => App\Models\Admin::class,
       't'  => App\Models\Teacher::class,
       'st' => App\Models\Student::class,

       'cg' => App\Models\Classes\Classgroup::class,
       'cr' => App\Models\Classes\Classroom::class,
       'l'  => App\Models\Classes\Level::class,
       'sb' => App\Models\Classes\Subject::class,

    ][$alias];
}

function mgc(string $alias)
{
    return getClass($alias);
}

function mgf(string $alias)
{
    return getClass($alias)::first();
}

function mgl(string $alias)
{
    return getClass($alias)::all()->last();
}

function clogin()
{
    return Auth::login(mgf('u'));
}

function mga(string $alias)
{
    return getClass($alias)::all();
}

function mgo(string $alias, int $id)
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
