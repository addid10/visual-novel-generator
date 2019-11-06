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
    public function handle($request, Closure $next, $roleNames)
    {
        if (!$request->user()->hasRole($roleNames)) {
            return redirect()
                ->to(route('login.index'));
        }

        return $next($request);
    }
}
