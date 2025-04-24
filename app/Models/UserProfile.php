<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use App\Models\ActivityLevel;
use App\Models\FitnessGoal;
use App\Models\ExperienceLevel;
use App\Models\WorkoutType;


class UserProfile extends Model
{
    use HasFactory;

    protected $table = 'user_profiles';

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'date_of_birth',
        'sex',
        'height_cm',
        'current_weight_kg',
        'activity_level_id',
        'fitness_goal_id',
        'experience_level_id',
        'workout_type_id',
        'last_profile_update',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'last_profile_update' => 'datetime',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function activityLevel()
    {
        return $this->belongsTo(ActivityLevel::class);
    }

    public function fitnessGoal()
    {
        return $this->belongsTo(FitnessGoal::class);
    }

    public function experienceLevel()
    {
        return $this->belongsTo(ExperienceLevel::class);
    }

    public function preferredWorkoutType()
    {
        return $this->belongsTo(WorkoutType::class, 'workout_type_id');
    }

    // Helper methods
    public function getAge()
    {
        return $this->date_of_birth->age;
    }

    public function getFullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function updateFromWeightHistory()
    {
        $latestWeight = $this->user->weightHistory()->latest('log_date')->first();
        
        if ($latestWeight) {
            $this->current_weight_kg = $latestWeight->weight_kg;
            $this->save();
        }
        
        return $this;
    }
}
