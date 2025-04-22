<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;


class WeightHistory extends Model
{
    use HasFactory;

    protected $table = 'weight_history';

    protected $fillable = [
        'user_id',
        'log_date',
        'weight_kg',
    ];

    protected $casts = [
        'log_date' => 'date',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Hooks
    protected static function booted()
    {
        static::created(function ($weightRecord) {
            // Update user's current weight in profile
            if ($profile = $weightRecord->user->profile) {
                $profile->current_weight_kg = $weightRecord->weight_kg;
                $profile->save();
            }
            
            // Create BMI record
            if ($profile && $profile->height_cm > 0) {
                $heightInMeters = $profile->height_cm / 100;
                $bmi = $weightRecord->weight_kg / ($heightInMeters * $heightInMeters);
                
                BmiRecord::create([
                    'user_id' => $weightRecord->user_id,
                    'log_date' => $weightRecord->log_date,
                    'bmi_value' => $bmi,
                    'interpretation' => self::getBmiInterpretation($bmi)
                ]);
            }
            
            // Recalculate nutrition goals if they exist
            if ($nutritionGoals = $weightRecord->user->nutritionGoals) {
                $nutritionGoals->recalculate();
            }
        });
    }

    // Helper methods
    public static function getBmiInterpretation($bmi)
    {
        if ($bmi < 18.5) {
            return 'Underweight';
        } elseif ($bmi < 25) {
            return 'Healthy Weight';
        } elseif ($bmi < 30) {
            return 'Overweight';
        } else {
            return 'Obese';
        }
    }

    public function scopeLastMonth($query)
    {
        return $query->where('log_date', '>=', now()->subMonth());
    }
}
