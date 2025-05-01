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
        
        // 4. Assign workout templates based on user preferences
        $workoutSchedules = $this->assignWorkoutSchedules($user, $profile);
        
        // 5. Show confirmation summary
        return view('profile.onboarding_summary', compact(
            'profile', 
            'bmiRecord', 
            'weightRecord', 
            'nutritionGoals', 
            'workoutSchedules'
        ));
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
        // Check if nutrition goals already exist
        $existingGoals = UserNutritionGoal::where('user_id', $user->id)->first();
        
        if ($existingGoals) {
            // Update existing goals based on latest profile data
            return $existingGoals->recalculate();
        }
        
        // Create basic nutrition goal
        $nutritionGoal = UserNutritionGoal::create([
            'user_id' => $user->id,
            'target_calories' => 2000, // Default value
            'target_protein_grams' => 100, // Default value
            'target_carb_grams' => 250, // Default value
            'target_fat_grams' => 70, // Default value
            'last_updated' => now()
        ]);
        
        // Recalculate with actual values based on profile
        return $nutritionGoal->recalculate();
    }
    
    /**
     * Assign workout templates based on user preferences
     *
     * @param \App\Models\User $user
     * @param \App\Models\UserProfile $profile
     * @return array
     */
    private function assignWorkoutSchedules($user, $profile)
    {
        // Check if user already has workout schedules for this week
        $existingSchedules = UserWorkoutSchedule::where('user_id', $user->id)
                                               ->whereBetween('assigned_date', [
                                                   Carbon::today(),
                                                   Carbon::today()->addDays(7)
                                               ])
                                               ->get();
                                               
        if ($existingSchedules->count() > 0) {
            return $existingSchedules;
        }
        
        $workoutSchedules = [];
        
        // Get appropriate templates based on user preferences
        $templates = $this->getWorkoutTemplatesForUser($profile);
        
        // Schedule workouts for the next 7 days
        $startDate = Carbon::tomorrow();
        foreach ($templates as $index => $template) {
            // Skip weekends or limit to 5 workouts per week
            if ($index >= 5) {
                break;
            }
            
            $assignedDate = $startDate->copy()->addDays($index);
            
            // Skip weekend days if needed
            if ($assignedDate->isWeekend()) {
                continue;
            }
            
            $workoutSchedule = UserWorkoutSchedule::create([
                'user_id' => $user->id,
                'template_id' => $template->id,
                'assigned_date' => $assignedDate,
                'status' => 'Pending'
            ]);
            
            $workoutSchedules[] = $workoutSchedule;
        }
        
        return $workoutSchedules;
    }
    
    /**
     * Get appropriate workout templates for the user
     *
     * @param \App\Models\UserProfile $profile
     * @return \Illuminate\Database\Eloquent\Collection
     */
    private function getWorkoutTemplatesForUser($profile)
    {
        $query = WorkoutTemplate::query();
        
        // Filter by user experience level
        if ($profile->experience_level_id) {
            $query->where('experience_level_id', $profile->experience_level_id);
        }
        
        // Filter by workout type if specified
        if ($profile->workout_type_id) {
            $query->where('workout_type_id', $profile->workout_type_id);
        }
        
        // Get a few templates for variety
        $templates = $query->inRandomOrder()->limit(7)->get();
        
        // If no specific templates found, get generic ones
        if ($templates->isEmpty()) {
            $templates = WorkoutTemplate::where('is_generic', true)
                ->inRandomOrder()
                ->limit(7)
                ->get();
                
            // If still no templates, create some basic ones
            if ($templates->isEmpty()) {
                // This is a fallback if no templates exist at all
                Log::warning('No workout templates found for user #' . $profile->user_id);
                
                // Return empty collection to avoid errors
                return collect([]);
            }
        }
        
        return $templates;
    }
}