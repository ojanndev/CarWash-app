<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if authenticated user is a customer (authenticated via customer guard)
        if (!auth()->guard('customer')->check()) {
            return redirect()->route('login');
        }
        
        // Check if the authenticated user is an admin
        $customer = auth()->guard('customer')->user();
        if ($customer && ($customer->id == 1 || $customer->email == 'admin@example.com')) {
            // If authenticated as admin, redirect to admin dashboard
            return redirect()->route('admin.dashboard');
        }

        return $next($request);
    }
}
