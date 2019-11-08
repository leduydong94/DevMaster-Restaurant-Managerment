<?php

namespace App\Http\Middleware;

use Closure;

class NonAuthMiddleware
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
        if ($request->session()->get('isLoggedIn', false)) {
            return redirect('/user');
        }
        return $next($request);
    }
}
