<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\WorkoutTemplate;
use App\Models\UserProfile;

class WorkoutType extends Model
{
    use HasFactory;

    protected $table = 'workout_types';

    protected $fillable = [
        'name',
    ];

    // Relationships
    public function userProfiles()
    {
        return $this->hasMany(UserProfile::class, 'preferred_workout_type_id');
    }

    public function workoutTemplates()
    {
        return $this->hasMany(WorkoutTemplate::class);
    }
}
