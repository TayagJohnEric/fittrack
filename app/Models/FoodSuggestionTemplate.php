<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FoodSuggestionTemplate extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'name', 'description', 'target_meal_type', 'min_experience_level_id'];

    public function category()
    {
        return $this->belongsTo(FoodSuggestionCategory::class);
    }

    public function minExperienceLevel()
    {
        return $this->belongsTo(ExperienceLevel::class, 'min_experience_level_id');
    }

    public function foodItems()
    {
        return $this->hasMany(TemplateFoodItem::class);
    }

    public function userFavorites()
    {
        return $this->hasMany(UserFavoriteSuggestion::class);
    }
}
