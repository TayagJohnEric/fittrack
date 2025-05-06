<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\UserProfile;
use App\Models\UserMealLog;
use App\Models\UserWorkoutSchedule;
use App\Models\WeightHistory;
use App\Models\BmiRecord;
use App\Models\UserNutritionGoal;
use App\Models\Allergy;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role', 
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relationships
    public function profile()
    {
        return $this->hasOne(UserProfile::class);
    }

    public function mealLogs()
    {
        return $this->hasMany(UserMealLog::class);
    }

    public function workoutSchedules()
    {
        return $this->hasMany(UserWorkoutSchedule::class);
    }

    public function weightHistory()
    {
        return $this->hasMany(WeightHistory::class);
    }

    public function bmiRecords()
    {
        return $this->hasMany(BmiRecord::class);
    }

    public function nutritionGoals()
    {
        return $this->hasOne(UserNutritionGoal::class);
    }

    public function allergies()
    {
        return $this->belongsToMany(Allergy::class, 'user_allergies', 'user_id', 'allergy_id');
    }

     /**
     * Calculate daily calorie requirements based on user profile
     * 
     * @return float|null
     */
    public function calculateDailyCalories()
    {
        $profile = $this->profile;
        
        if (!$profile || !$profile->height_cm || !$profile->current_weight_kg || !$profile->date_of_birth) {
            return null;
        }
        
        // Calculate BMR using the Mifflin-St Jeor Equation
        $age = $profile->getAge();
        $weight = $profile->current_weight_kg;
        $height = $profile->height_cm;
        
        // BMR formula
        if (strtolower($profile->sex) == 'male') {
            $bmr = 10 * $weight + 6.25 * $height - 5 * $age + 5;
        } else {
            $bmr = 10 * $weight + 6.25 * $height - 5 * $age - 161;
        }
        
        // Activity multiplier
        $activityMultiplier = 1.2; // Default to sedentary
        
        if ($profile->activityLevel) {
            $activityName = strtolower($profile->activityLevel->name);
            
            if (strpos($activityName, 'sedentary') !== false) {
                $activityMultiplier = 1.2;
            } elseif (strpos($activityName, 'light') !== false) {
                $activityMultiplier = 1.375;
            } elseif (strpos($activityName, 'moderate') !== false) {
                $activityMultiplier = 1.55;
            } elseif (strpos($activityName, 'active') !== false || strpos($activityName, 'high') !== false) {
                $activityMultiplier = 1.725;
            } elseif (strpos($activityName, 'very') !== false || strpos($activityName, 'extreme') !== false) {
                $activityMultiplier = 1.9;
            }
        }
        
        // TDEE (Total Daily Energy Expenditure)
        return $bmr * $activityMultiplier;
    }


    public function getCurrentBmi()
    {
        try {
            if (!$this->profile) {
                throw new \Exception('User profile not found. Please complete your profile to calculate BMI.');
            }
            
            // Validate required fields
            if (!$this->profile->current_weight_kg || !$this->profile->height_cm) {
                throw new \Exception('Required profile information missing. Please complete your profile with weight and height.');
            }
            
            $heightInMeters = $this->profile->height_cm / 100;
            return $this->profile->current_weight_kg / ($heightInMeters * $heightInMeters);
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Error calculating BMI: ' . $e->getMessage());
            return null;
        }
    }

   /**
     * Check if user has completed onboarding
     * 
     * @return bool
     */
    public function hasCompletedOnboarding()
    {
        return $this->nutritionGoals()->exists() && 
               $this->bmiRecords()->exists() && 
               $this->weightHistory()->exists() && 
               $this->workoutSchedules()->exists();
    }
}
