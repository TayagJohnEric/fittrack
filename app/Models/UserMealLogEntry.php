<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\UserMealLog;
use App\Models\FoodItem;


class UserMealLogEntry extends Model
{
    use HasFactory;

    protected $table = 'user_meal_log_entries';

    protected $fillable = [
        'meal_log_id',
        'food_id',
        'quantity_consumed',
        'custom_food_name',
        'custom_calories',
        'custom_protein',
        'custom_carbs',
        'custom_fat',
    ];

    // Relationships
    public function mealLog()
    {
        return $this->belongsTo(UserMealLog::class, 'meal_log_id');
    }

    public function food()
    {
        return $this->belongsTo(FoodItem::class, 'food_id');
    }

    // Helper methods
    public function getFoodName()
    {
        return $this->food_id ? $this->food->name : $this->custom_food_name;
    }

    public function getCalories()
    {
        return $this->food_id ? 
            $this->food->calories_per_serving * $this->quantity_consumed : 
            $this->custom_calories;
    }

    public function getProtein()
    {
        return $this->food_id ? 
            $this->food->protein_grams_per_serving * $this->quantity_consumed : 
            $this->custom_protein;
    }

    public function getCarbs()
    {
        return $this->food_id ? 
            $this->food->carb_grams_per_serving * $this->quantity_consumed : 
            $this->custom_carbs;
    }

    public function getFat()
    {
        return $this->food_id ? 
            $this->food->fat_grams_per_serving * $this->quantity_consumed : 
            $this->custom_fat;
    }
}
