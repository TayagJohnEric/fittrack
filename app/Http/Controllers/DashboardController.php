<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\ActivityLevel;
use Illuminate\Support\Facades\Log;
use App\Models\BmiRecord;
use App\Models\UserNutritionGoal;
use App\Models\UserWorkoutSchedule;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        try {
            $user = Auth::user();
            $profile = $user->profile;
            
            if (!$profile) {
                return redirect()->route('profile.setup.basics')->with('error', 'Please complete your profile setup first.');
            }

            // Check if basic profile info is missing
            if (!$profile->first_name || !$profile->last_name || !$profile->date_of_birth || !$profile->sex) {
                return redirect()->route('profile.setup.basics')
                    ->with('error', 'Please complete your basic profile information.');
            }
            
            // Check if physical info is missing
            if (!$profile->height_cm || !$profile->current_weight_kg) {
                return redirect()->route('profile.setup.physical')
                    ->with('error', 'Please complete your physical information.');
            }
            
            // Check if preferences are missing
            if (!$profile->activity_level_id || !$profile->fitness_goal_id || 
                !$profile->experience_level_id || !$profile->workout_type_id) {
                return redirect()->route('profile.setup.preferences')
                    ->with('error', 'Please complete your fitness preferences.');
            }
            
            // Get BMI record
            $bmiRecord = BmiRecord::where('user_id', $user->id)
                ->where('log_date', Carbon::today())
                ->first();
            
            // Get nutrition goals
            $nutritionGoals = UserNutritionGoal::where('user_id', $user->id)->first();
            
            return view('user.dashboard', compact(
                'user',
                'profile',
                'bmiRecord',
                'nutritionGoals'
            ));
        } catch (\Exception $e) {
            Log::error('Dashboard error: ' . $e->getMessage());
            return redirect()->route('profile.setup.basics')
                ->with('error', 'There was an error loading your dashboard. Please try again.');
        }
    }
}