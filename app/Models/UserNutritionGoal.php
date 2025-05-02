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
        
        switch (true) {
            case stripos($goalName, 'Weight Loss') !== false:
                $calorieTarget = $baseCalories * 0.8; // 20% deficit
                $proteinTarget = $user->profile->current_weight_kg * 2.0; // Higher protein for weight loss
                $fatTarget = $user->profile->current_weight_kg * 0.8;
                break;
                
            case stripos($goalName, 'Muscle Gain') !== false:
                $calorieTarget = $baseCalories * 1.1; // 10% surplus
                $proteinTarget = $user->profile->current_weight_kg * 2.2; // Higher protein for muscle gain
                $fatTarget = $user->profile->current_weight_kg * 1.0;
                break;
                
            case stripos($goalName, 'Strength Building') !== false:
                $calorieTarget = $baseCalories * 1.05; // 5% surplus
                $proteinTarget = $user->profile->current_weight_kg * 2.0;
                $fatTarget = $user->profile->current_weight_kg * 0.9;
                break;
                
            case stripos($goalName, 'Body Recomposition') !== false:
                $calorieTarget = $baseCalories * 0.95; // Slight deficit
                $proteinTarget = $user->profile->current_weight_kg * 2.2; // Higher protein for body recomposition
                $fatTarget = $user->profile->current_weight_kg * 0.9;
                break;
                
            case stripos($goalName, 'Athletic Performance') !== false:
                $calorieTarget = $baseCalories * 1.15; // Higher surplus for performance
                $proteinTarget = $user->profile->current_weight_kg * 1.8;
                $fatTarget = $user->profile->current_weight_kg * 1.1;
                break;
                
            case stripos($goalName, 'Improve Endurance') !== false:
                $calorieTarget = $baseCalories * 1.1; // Higher carbs for endurance
                $proteinTarget = $user->profile->current_weight_kg * 1.6;
                $fatTarget = $user->profile->current_weight_kg * 0.8;
                break;
                
            case stripos($goalName, 'Maintain Current Fitness') !== false:
                $calorieTarget = $baseCalories;
                $proteinTarget = $user->profile->current_weight_kg * 1.6;
                $fatTarget = $user->profile->current_weight_kg * 0.9;
                break;
                
            default: // Improve General Fitness, Increase Flexibility, etc.
                $calorieTarget = $baseCalories;
                $proteinTarget = $user->profile->current_weight_kg * 1.8;
                $fatTarget = $user->profile->current_weight_kg * 0.9;
                break;
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
