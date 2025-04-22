<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use App\Models\UserMealLogEntry;


class UserMealLog extends Model
{
    use HasFactory;

    protected $table = 'user_meal_logs';

    protected $fillable = [
        'user_id',
        'log_date',
        'meal_type',
    ];

    protected $casts = [
        'log_date' => 'date',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function entries()
    {
        return $this->hasMany(UserMealLogEntry::class, 'meal_log_id');
    }

    // Helper methods
    public function getTotalCalories()
    {
        $total = 0;
        
        foreach ($this->entries as $entry) {
            if ($entry->food_id) {
                $total += $entry->food->calories_per_serving * $entry->quantity_consumed;
            } else {
                $total += $entry->custom_calories;
            }
        }
        
        return $total;
    }

    public function getTotalMacros()
    {
        $macros = [
            'protein' => 0,
            'carbs' => 0,
            'fat' => 0
        ];
        
        foreach ($this->entries as $entry) {
            if ($entry->food_id) {
                $macros['protein'] += $entry->food->protein_grams_per_serving * $entry->quantity_consumed;
                $macros['carbs'] += $entry->food->carb_grams_per_serving * $entry->quantity_consumed;
                $macros['fat'] += $entry->food->fat_grams_per_serving * $entry->quantity_consumed;
            } else {
                $macros['protein'] += $entry->custom_protein;
                $macros['carbs'] += $entry->custom_carbs;
                $macros['fat'] += $entry->custom_fat;
            }
        }
        
        return $macros;
    }

    public function scopeForDate($query, $date)
    {
        return $query->whereDate('log_date', $date);
    }
}
