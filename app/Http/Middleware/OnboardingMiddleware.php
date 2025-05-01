<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class OnboardingMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        
        // If user hasn't completed onboarding and is not already on the onboarding route
        if (!$user->hasCompletedOnboarding() && !$request->routeIs('onboarding.process') && !$request->routeIs('profile.create')) {
            return redirect()->route('onboarding.process');
        }
        
        return $next($request);
    }
}
