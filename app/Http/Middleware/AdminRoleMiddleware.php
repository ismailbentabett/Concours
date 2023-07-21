<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated and has the 'admin' role
        if ($request->user() && $request->user()->role === 'admin') {
            return $next($request);
        }

        // If the user is not an admin, you can handle the response as needed.
        // For example, you can redirect them to another page or return an error.
        return redirect()->route('home')->with('error', 'You do not have permission to access this page.');
    }
}
