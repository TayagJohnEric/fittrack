<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\ExperienceLevel;
use App\Models\WorkoutType;
use App\Models\Exercise;
use App\Models\UserWorkoutSchedule;

class WorkoutTemplate extends Model
{
    use HasFactory;

    protected $table = 'workout_templates';

    protected $fillable = [
        'name',
        'description',
        'experience_level_id',
        'workout_type_id',
        'is_generic',
    ];

    // Relationships
    public function experienceLevel()
    {
        return $this->belongsTo(ExperienceLevel::class);
    }

    public function workoutType()
    {
        return $this->belongsTo(WorkoutType::class);
    }

    public function exercises()
    {
        return $this->belongsToMany(Exercise::class, 'workout_template_exercises')
                    ->withPivot(['sets', 'reps', 'duration_seconds', 'rest_seconds', 'order_in_workout'])
                    ->orderBy('pivot_order_in_workout');
    }

    public function userSchedules()
    {
        return $this->hasMany(UserWorkoutSchedule::class, 'template_id');
    }

    // Helper methods
    public function getTotalExercises()
    {
        return $this->exercises->count();
    }

    public function getEstimatedDuration()
    {
        // Calculate estimated workout duration based on sets, reps, and rest times
        $totalSeconds = 0;
        
        foreach ($this->exercises as $exercise) {
            $setTime = 0;
            
            // Average time per rep (assumption: 3 seconds)
            if ($exercise->pivot->reps) {
                $setTime += $exercise->pivot->reps * 3;
            }
            
            // Or if it's a timed exercise
            if ($exercise->pivot->duration_seconds) {
                $setTime += $exercise->pivot->duration_seconds;
            }
            
            // Multiply by number of sets
            $totalSeconds += $setTime * $exercise->pivot->sets;
            
            // Add rest time between sets
            $totalSeconds += $exercise->pivot->rest_seconds * ($exercise->pivot->sets - 1);
        }
        
        // Add rest between exercises (assumption: 60 seconds between exercises)
        $totalSeconds += 60 * (max($this->exercises->count() - 1, 0));
        
        return ceil($totalSeconds / 60); // Return minutes
    }
}
