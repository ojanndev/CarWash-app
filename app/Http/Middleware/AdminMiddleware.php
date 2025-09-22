<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is authenticated via customer guard and is admin (ID = 1 or admin email)
        if (!auth()->guard('customer')->check()) {
            return redirect()->route('login');
        }
        
        $customer = auth()->guard('customer')->user();
        if ($customer->id !== 1 && $customer->email !== 'admin@example.com') {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
