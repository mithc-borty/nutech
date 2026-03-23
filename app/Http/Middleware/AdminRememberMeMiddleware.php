<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminRememberMeMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check() && $request->hasCookie(Auth::getRecallerName())) {
            Auth::viaRemember();
        }

        return $next($request);
    }
}