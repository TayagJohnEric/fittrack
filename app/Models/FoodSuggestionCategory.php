<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FoodSuggestionCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'fitness_goal_id'];

    public function fitnessGoal()
    {
        return $this->belongsTo(FitnessGoal::class);
    }

    public function templates()
    {
        return $this->hasMany(FoodSuggestionTemplate::class);
    }
}
