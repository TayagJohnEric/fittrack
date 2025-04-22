<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\UserProfile;
use App\Models\WorkoutTemplate;

class ExperienceLevel extends Model
{
    use HasFactory;

    protected $table = 'experience_levels';

    protected $fillable = [
        'name',
    ];

    // Relationships
    public function userProfiles()
    {
        return $this->hasMany(UserProfile::class);
    }

    public function workoutTemplates()
    {
        return $this->hasMany(WorkoutTemplate::class);
    }
}
