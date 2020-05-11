<?php

namespace App\Http\Middleware;

use Closure;

class UserRightsCheck
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
        if (empty($request->user)) {
            abort(500);
        }

        if ((int)$request->user !== (int)\Auth::user()->id) {
            abort(403);
        }

        return $next($request);
    }
}
