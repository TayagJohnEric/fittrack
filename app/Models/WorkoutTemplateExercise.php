<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\WorkoutTemplate;
use App\Models\Exercise;

class WorkoutTemplateExercise extends Model
{
    use HasFactory;

    protected $table = 'workout_template_exercises';

    protected $fillable = [
        'template_id',
        'exercise_id',
        'sets',
        'reps',
        'duration_seconds',
        'rest_seconds',
        'order_in_workout',
    ];

    // Relationships
    public function workoutTemplate()
    {
        return $this->belongsTo(WorkoutTemplate::class, 'template_id');
    }

    public function exercise()
    {
        return $this->belongsTo(Exercise::class);
    }
}
