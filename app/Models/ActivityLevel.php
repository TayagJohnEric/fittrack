<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\UserProfile;

class ActivityLevel extends Model
{
    use HasFactory;

    protected $table = 'activity_levels';

    protected $fillable = [
        'name',
        'description',
    ];

    // Relationships
    public function userProfiles()
    {
        return $this->hasMany(UserProfile::class);
    }
}
