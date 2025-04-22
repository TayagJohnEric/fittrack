<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\WorkoutTemplate;

class Exercise extends Model
{
    use HasFactory;

    protected $table = 'exercises';

    protected $fillable = [
        'name',
        'description',
        'muscle_group',
        'equipment_needed',
        'video_url',
    ];

    // Relationships
    public function workoutTemplates()
    {
        return $this->belongsToMany(WorkoutTemplate::class, 'workout_template_exercises')
                    ->withPivot(['sets', 'reps', 'duration_seconds', 'rest_seconds', 'order_in_workout']);
    }
}
