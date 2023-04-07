<?php

namespace App\HTTP\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\HTTP\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login');
    }
}
