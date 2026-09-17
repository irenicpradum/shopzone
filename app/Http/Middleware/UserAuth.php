<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAuth
{
    public function handle(Request $request, Closure $next): Response
    {
        // Agar user login page par hai aur already login hai
        if ($request->path() == 'login' && $request->session()->has('user')) {
            return redirect('/');
        }

        return $next($request);
    }
}