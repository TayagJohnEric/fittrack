<?php

namespace App\Http\Controllers;

use App\Models\ActivityLevel;
use App\Models\Allergy;
use App\Models\ExperienceLevel;
use App\Models\FitnessGoal;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\WorkoutType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ProfileSetupController extends Controller
{
    public function showBasics()
    {
        $user = Auth::user();
        $profile = $user->profile;

        return view('profile.setup_basics', compact('profile'));
    }

    public function storeBasics(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date|before:today',
            'sex' => 'required|in:Male,Female,Other,PreferNotToSay',
        ]);

        $user = Auth::user();
        $profile = $user->profile;
        

        try {
            if ($profile) {
                $profile->update($validated);
            } else {
                $profile = new UserProfile($validated);
                $profile->user_id = $user->id;
                $profile->save();
            }
    
            return redirect()->route('profile.setup.physical');
        } catch (\Exception $e) {
            Log::error('Error storing basics: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Failed to save profile information. Please try again.']);
        }
    }

    public function showPhysical()
    {
        $user = Auth::user();
        $profile = $user->profile;

        if (!$profile || !$profile->first_name) {
            return redirect()->route('profile.setup.basics')->with('error', 'Please complete the basics first.');
        }

        return view('profile.setup_physical', compact('profile'));
    }

    public function storePhysical(Request $request)
    {
        $validated = $request->validate([
            'height_cm' => 'required|integer|min:100|max:300',
            'current_weight_kg' => 'required|numeric|min:20|max:500',
        ]);

        $user = Auth::user();
        $profile = $user->profile;

        if (!$profile) {
            return redirect()->route('profile.setup.basics')->with('error', 'Please complete the basics first.');
        }

        try {
            $profile->update($validated);
            return redirect()->route('profile.setup.preferences');
        } catch (\Exception $e) {
            Log::error('Error storing physical: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Failed to save physical information. Please try again.']);
        }
    }

    public function showPreferences()
    {
        $user = Auth::user();
        $profile = $user->profile;

        if (!$profile || !$profile->height_cm || !$profile->current_weight_kg) {
            return redirect()->route('profile.setup.physical')->with('error', 'Please complete the physical information first.');
        }

        try {
            $activityLevels = ActivityLevel::all();
            $fitnessGoals = FitnessGoal::all();
            $experienceLevels = ExperienceLevel::all();
            $workoutTypes = WorkoutType::all();
            $allergies = Allergy::all();
            $userAllergies = $user->allergies->pluck('id')->toArray();

            return view('profile.setup_preferences', compact(
                'profile',
                'activityLevels',
                'fitnessGoals',
                'experienceLevels',
                'workoutTypes',
                'allergies',
                'userAllergies'
            ));
        } catch (\Exception $e) {
            Log::error('Error showing preferences: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Failed to load preferences. Please try again.']);
        }
    }

    public function storePreferences(Request $request)
    {
        $validated = $request->validate([
            'activity_level_id' => 'required|exists:activity_levels,id',
            'fitness_goal_id' => 'required|exists:fitness_goals,id',
            'experience_level_id' => 'required|exists:experience_levels,id',
            'workout_type_id' => 'required|exists:workout_types,id',
            'allergies' => 'nullable|array',
            'allergies.*' => 'exists:allergies,id',
        ]);

        $user = Auth::user();
        $profile = $user->profile;

        if (!$profile) {
            return redirect()->route('profile.setup.basics')->with('error', 'Please complete the basics first.');
        }

        try {
            // Update profile preferences
            $profile->update([
                'activity_level_id' => $validated['activity_level_id'],
                'fitness_goal_id' => $validated['fitness_goal_id'],
                'experience_level_id' => $validated['experience_level_id'],
                'workout_type_id' => $validated['workout_type_id'],
                'last_profile_update' => now(),
            ]);

            // Update allergies
            if (isset($validated['allergies'])) {
                $user->allergies()->sync($validated['allergies']);
            }

            return redirect()->route('dashboard')->with('success', 'Profile setup completed successfully!');
        } catch (\Exception $e) {
            Log::error('Error storing preferences: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Failed to save preferences. Please try again.']);
        }
    }
}