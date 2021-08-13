<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetAPILocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->hasHeader('locale')) {
            app()->setLocale($request->header('locale'));
        }
        return $next($request);
    }
}
