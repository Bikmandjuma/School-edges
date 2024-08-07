<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; // Import Log facade

class UpdateLastActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next ,$guard = null): Response
    {
        Log::info('UpdateLastActive middleware executed');

        if (Auth::guard('user')->check()) {
            Auth::guard('user')->user()->update(['last_active_at' => now()]);
        }

        return $next($request);
    }
}
