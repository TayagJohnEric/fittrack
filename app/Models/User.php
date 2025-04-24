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

    // Helper methods
    public function calculateDailyCalories()
    {
        try {
            if (!$this->profile) {
                throw new \Exception('User profile not found. Please complete your profile to calculate daily calories.');
            }
            
            if (!$this->profile->activityLevel) {
                throw new \Exception('Activity level not set. Please set your activity level in your profile.');
            }
            
            $profile = $this->profile;
            $activityMultiplier = $profile->activityLevel->multiplier ?? 1.2;
            
            // Validate required fields
            if (!$profile->current_weight_kg || !$profile->height_cm || !$profile->date_of_birth || !$profile->sex) {
                throw new \Exception('Required profile information missing. Please complete your profile with weight, height, date of birth, and sex.');
            }
            
            // Basic BMR using Harris-Benedict equation
            $bmr = 0;
            if ($profile->sex === 'Male') {
                $bmr = 88.362 + (13.397 * $profile->current_weight_kg) + 
                       (4.799 * $profile->height_cm) - (5.677 * $profile->getAge());
            } else {
                $bmr = 447.593 + (9.247 * $profile->current_weight_kg) + 
                       (3.098 * $profile->height_cm) - (4.330 * $profile->getAge());
            }
            
            return $bmr * $activityMultiplier;
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Error calculating daily calories: ' . $e->getMessage());
            return null;
        }
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

 
}
