<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
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
        if ($request->role_id = 0) {
            redirect('/');
        }
        if ($request->role_id = 1) {
            redirect('/moderator/dashboard');
        }
        if ($request->role_id = 2) {
            redirect('/admin/dashboard');
        }
        return $next($request);
    }
}
