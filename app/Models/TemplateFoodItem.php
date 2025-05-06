<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TemplateFoodItem extends Model
{
    use HasFactory;

    protected $fillable = ['template_id', 'food_id', 'suggested_quantity', 'is_required', 'alternatives_group_id'];

    public function template()
    {
        return $this->belongsTo(FoodSuggestionTemplate::class);
    }

    public function food()
    {
        return $this->belongsTo(FoodItem::class);
    }
}
