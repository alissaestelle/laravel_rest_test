<?php

namespace App\HTTP\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\HTTP\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HTTPFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\HTTP\Request): (\Symfony\Component\HTTPFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}
