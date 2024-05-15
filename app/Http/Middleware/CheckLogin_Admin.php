<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckLogin_Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            // Redirect to the login page if not logged in
            return redirect()->route("admin.login");
        }
        if (Auth::user()->phanquyen != 1) {
            // Redirect to a forbidden page or perform other actions as needed
            abort(403, 'Unauthorized action.');
        }
        return $next($request);
    }
}
