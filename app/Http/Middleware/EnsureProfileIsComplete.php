<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class EnsureProfileIsComplete
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        $profile = $user->profile;

        // If no profile or incomplete profile, redirect to the appropriate setup step
        if (!$profile) {
            return redirect()->route('profile.setup.basics');
        }

        if (!$profile->height_cm || !$profile->current_weight_kg) {
            return redirect()->route('profile.setup.physical');
        }

        if (!$profile->activity_level_id || !$profile->fitness_goal_id || 
            !$profile->experience_level_id || !$profile->preferred_workout_type_id) {
            return redirect()->route('profile.setup.preferences');
        }

        return $next($request);
    }
    }

