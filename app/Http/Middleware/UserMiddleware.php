<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->role == 'user') {
            return $next($request);
        } else {
            // Redirect or handle unauthorized access
            return redirect()->route('home')->with('message', 'Anda harus login sebagai user'); // You can customize this line based on your needs
        }
    }
}
