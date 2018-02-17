<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class EntrustUsers
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->isPermitted($request)) {
            return $next($request);
        }

        flash('Oh snap! Looks like you don\'t have permission to access that page.')->warning();
        return back();
    }
}
