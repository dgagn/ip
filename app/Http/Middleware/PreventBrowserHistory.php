<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PreventBrowserHistory
{
    /**
     * Handle an incoming request. Prevents back button to access logged in
     * previous user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        return $response->header('Cache-Control', 'no-cache,no-store, max-age=0, must-revalidate')
            ->header('Pragma', 'no-cache')
            ->header('Expires', 'Sun, 01 Jan 2000 00:00:00 GMT');
    }
}
