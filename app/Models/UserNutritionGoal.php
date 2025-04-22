<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;

class UserNutritionGoal extends Model
{
    use HasFactory;

    protected $table = 'user_nutrition_goals';

    protected $fillable = [
        'user_id',
        'target_calories',
        'target_protein_grams',
        'target_carb_grams',
        'target_fat_grams',
        'last_updated',
    ];

    protected $casts = [
        'last_updated' => 'datetime',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Helper methods
    public function recalculate()
    {
        $user = $this->user;
        
        if (!$user->profile) {
            return $this;
        }
        
        // Calculate baseline calories from user profile
        $baseCalories = $user->calculateDailyCalories();
        
        // Adjust based on fitness goal
        $goalName = $user->profile->fitnessGoal->name ?? '';
        
        if (stripos($goalName, 'weight loss') !== false) {
            $calorieTarget = $baseCalories * 0.8; // 20% deficit
            $proteinTarget = $user->profile->current_weight_kg * 2.0; // Higher protein for weight loss
            $fatTarget = $user->profile->current_weight_kg * 0.8;
        } elseif (stripos($goalName, 'muscle gain') !== false) {
            $calorieTarget = $baseCalories * 1.1; // 10% surplus
            $proteinTarget = $user->profile->current_weight_kg * 2.2; // Higher protein for muscle gain
            $fatTarget = $user->profile->current_weight_kg * 1.0;
        } else {
            // Maintenance
            $calorieTarget = $baseCalories;
            $proteinTarget = $user->profile->current_weight_kg * 1.8;
            $fatTarget = $user->profile->current_weight_kg * 0.9;
        }
        
        // Calculate carbs based on remaining calories
        $proteinCalories = $proteinTarget * 4; // 4 calories per gram of protein
        $fatCalories = $fatTarget * 9; // 9 calories per gram of fat
        $remainingCalories = $calorieTarget - $proteinCalories - $fatCalories;
        $carbTarget = max(0, $remainingCalories / 4); // 4 calories per gram of carbs
        
        // Update the model
        $this->target_calories = round($calorieTarget);
        $this->target_protein_grams = round($proteinTarget);
        $this->target_carb_grams = round($carbTarget);
        $this->target_fat_grams = round($fatTarget);
        $this->last_updated = now();
        $this->save();
        
        return $this;
    }
}
