<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\UserProfile;

class FitnessGoal extends Model
{
    use HasFactory;

    protected $table = 'fitness_goals';

    protected $fillable = [
        'name',
    ];

    // Relationships
    public function userProfiles()
    {
        return $this->hasMany(UserProfile::class);
    }
}
