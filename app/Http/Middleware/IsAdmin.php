<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        // Session se logged-in user nikalo
        $user = session('user');

        // Check 1: User login hai ya nahi
        // Check 2: is_admin ki value 1 hai ya nahi
        if ($user && isset($user->is_admin) && $user->is_admin == 1) {
            return $next($request); // Allowed: Admin ko aage jaane do
        }

        // Agar admin nahi hai to login ya home page redirect karo
        return redirect('/login')->with('error', 'Access Denied! You must be an Admin.');
    }
}