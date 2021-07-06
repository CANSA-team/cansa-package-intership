<?php

namespace Cansa\Intership\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CheckDay
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
        if ($request->start_date > $request->end_date) {
            return back()->withErrors(['status' => ['End date is not later Start date']]);
        }
        return $next($request);
    }
}
