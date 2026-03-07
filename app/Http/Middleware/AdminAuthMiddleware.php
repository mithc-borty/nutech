<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthMiddleware
{
    public function handle(Request $request, Closure $next, ...$allowedTypes): Response
    {
        if (!Auth::check() || !in_array(Auth::user()->user_type, $allowedTypes)) {
            return redirect(url('/admin/login'));
        }

        return $next($request);
    }
}