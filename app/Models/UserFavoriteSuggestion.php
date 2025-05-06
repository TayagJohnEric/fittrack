<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserFavoriteSuggestion extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'template_id', 'saved_at', 'custom_name', 'last_used'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function template()
    {
        return $this->belongsTo(FoodSuggestionTemplate::class);
    }
}