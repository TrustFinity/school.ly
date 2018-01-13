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
    return Auth::login(mgf('u'));
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
