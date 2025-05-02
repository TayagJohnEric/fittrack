<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\UserProfile;
use App\Models\BmiRecord;
use App\Models\WeightHistory;
use App\Models\UserNutritionGoal;
use App\Models\UserWorkoutSchedule;
use App\Models\WorkoutTemplate;
use Illuminate\Support\Facades\Log;

class OnboardingController extends Controller
{
    /**
     * Process user onboarding after registration
     *
     * @return \Illuminate\Http\Response
     */
    public function processOnboarding()
    {
        $user = Auth::user();
        $profile = $user->profile;
        
        // Check if user has a complete profile
        if (!$profile || !$profile->first_name || !$profile->height_cm || !$profile->current_weight_kg) {
            // Determine which step of profile setup they need to go to
            if (!$profile || !$profile->first_name) {
                return redirect()->route('profile.setup.basics')
                    ->with('info', 'Please complete your profile to continue with onboarding.');
            } elseif (!$profile->height_cm || !$profile->current_weight_kg) {
                return redirect()->route('profile.setup.physical')
                    ->with('info', 'Please complete your physical information to continue with onboarding.');
            } else {
                return redirect()->route('profile.setup.preferences')
                    ->with('info', 'Please complete your preferences to continue with onboarding.');
            }
        }
        
        // Check if user already completed onboarding
        if ($user->hasCompletedOnboarding()) {
            return redirect()->route('dashboard')
                ->with('info', 'You have already completed the onboarding process.');
        }
        
        // 1. Calculate BMI using the user's height and weight
        $bmiRecord = $this->calculateAndStoreBmi($user, $profile);
        
        // 2. Log initial weight in weight history
        $weightRecord = $this->logInitialWeight($user, $profile);
        
        // 3. Generate personalized nutrition goals
        $nutritionGoals = $this->generateNutritionGoals($user, $profile);
        
        // 5. Show confirmation summary and redirect to dashboard
        return view('profile.onboarding_summary', compact(
            'profile', 
            'bmiRecord', 
            'weightRecord', 
            'nutritionGoals'
        ))->with('success', 'Onboarding completed successfully!');
    }
    
    /**
     * Calculate and store BMI record
     *
     * @param \App\Models\User $user
     * @param \App\Models\UserProfile $profile
     * @return \App\Models\BmiRecord
     */
    private function calculateAndStoreBmi($user, $profile)
    {
        if (!$profile->height_cm || !$profile->current_weight_kg) {
            return null;
        }
        
        $heightInMeters = $profile->height_cm / 100;
        $bmiValue = $profile->current_weight_kg / ($heightInMeters * $heightInMeters);
        $interpretation = WeightHistory::getBmiInterpretation($bmiValue);
        
        // Using updateOrCreate to avoid duplicate key errors
        return BmiRecord::updateOrCreate(
            [
                'user_id' => $user->id,
                'log_date' => Carbon::today()
            ],
            [
                'bmi_value' => round($bmiValue, 2),
                'interpretation' => $interpretation
            ]
        );
    }
    
    /**
     * Log initial weight in weight history
     *
     * @param \App\Models\User $user
     * @param \App\Models\UserProfile $profile
     * @return \App\Models\WeightHistory
     */
    private function logInitialWeight($user, $profile)
    {
        if (!$profile->current_weight_kg) {
            return null;
        }
        
        // Using updateOrCreate to avoid duplicate key errors
        return WeightHistory::updateOrCreate(
            [
                'user_id' => $user->id,
                'log_date' => Carbon::today()
            ],
            [
                'weight_kg' => $profile->current_weight_kg
            ]
        );
    }
    
    /**
     * Generate personalized nutrition goals
     *
     * @param \App\Models\User $user
     * @param \App\Models\UserProfile $profile
     * @return \App\Models\UserNutritionGoal
     */
    private function generateNutritionGoals($user, $profile)
    {
        // Calculate base calories
        $baseCalories = $user->calculateDailyCalories();
        
        if (!$baseCalories) {
            Log::error('Could not calculate base calories for user: ' . $user->id);
            return null;
        }
        
        // Adjust based on fitness goal
        $goalName = $profile->fitnessGoal->name ?? '';
        $calorieTarget = $baseCalories;
        $proteinTarget = $profile->current_weight_kg * 1.8; // Default protein target
        $fatTarget = $profile->current_weight_kg * 0.9; // Default fat target
        
        if (stripos($goalName, 'Weight Loss') !== false) {
            $calorieTarget = $baseCalories * 0.8; // 20% deficit
            $proteinTarget = $profile->current_weight_kg * 2.0; // Higher protein for weight loss
            $fatTarget = $profile->current_weight_kg * 0.8;
        } elseif (stripos($goalName, 'Muscle Gain') !== false) {
            $calorieTarget = $baseCalories * 1.1; // 10% surplus
            $proteinTarget = $profile->current_weight_kg * 2.2; // Higher protein for muscle gain
            $fatTarget = $profile->current_weight_kg * 1.0;
        }
        
        // Calculate carbs based on remaining calories
        $proteinCalories = $proteinTarget * 4; // 4 calories per gram of protein
        $fatCalories = $fatTarget * 9; // 9 calories per gram of fat
        $remainingCalories = $calorieTarget - $proteinCalories - $fatCalories;
        $carbTarget = max(0, $remainingCalories / 4); // 4 calories per gram of carbs
        
        // Create or update nutrition goals
        return UserNutritionGoal::updateOrCreate(
            ['user_id' => $user->id],
            [
                'target_calories' => round($calorieTarget),
                'target_protein_grams' => round($proteinTarget),
                'target_carb_grams' => round($carbTarget),
                'target_fat_grams' => round($fatTarget),
                'last_updated' => now()
            ]
        );
    }
}