<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FoodItem extends Model
{
    use HasFactory;

    protected $table = 'food_items';

    protected $fillable = [
        'name',
        'serving_size_description',
        'serving_size_grams',
        'calories_per_serving',
        'protein_grams_per_serving',
        'carb_grams_per_serving',
        'fat_grams_per_serving',
        'allergy_info',
        'image_url',
    ];

    protected $casts = [
        'allergy_info' => 'json',
    ];

    // Helper methods
    public function checkForAllergy($allergyName)
    {
        if (is_string($this->allergy_info)) {
            return str_contains(strtolower($this->allergy_info), strtolower($allergyName));
        }
        
        if (is_array($this->allergy_info)) {
            return in_array(strtolower($allergyName), array_map('strtolower', $this->allergy_info));
        }
        
        return false;
    }
}
