<?php

namespace App\Services;

use App\Models\User;
use App\Models\WorkoutTemplate;
use App\Models\FoodItem;
use App\Models\UserWorkoutSchedule;
use Carbon\Carbon;

class OnboardingService
{
    /**
     * Assign workout templates to a user based on their preferences
     *
     * @param User $user
     * @return void
     */
    public function assignWorkoutTemplates(User $user)
    {
        if (!$user->profile) {
            return;
        }

        $profile = $user->profile;
        
        // Get appropriate templates based on user's experience level and preferred workout type
        $templates = WorkoutTemplate::where('experience_level_id', $profile->experience_level_id)
            ->where('workout_type_id', $profile->workout_type_id)
            ->where('is_generic', true)
            ->get();

        if ($templates->isEmpty()) {
            return;
        }

        // Assign templates for the next 7 days
        $startDate = Carbon::today();
        
        foreach ($templates as $template) {
            // Create a schedule entry for each template
            UserWorkoutSchedule::create([
                'user_id' => $user->id,
                'template_id' => $template->id,
                'assigned_date' => $startDate,
                'status' => 'Pending'
            ]);
            
            $startDate->addDay();
        }
    }

    /**
     * Get food suggestions based on user's allergies
     *
     * @param User $user
     * @return array
     */
    public function getFoodSuggestions(User $user)
    {
        $userAllergies = $user->allergies->pluck('name')->toArray();
        
        // Get all food items that don't contain any of the user's allergies
        $suggestedFoods = FoodItem::where(function ($query) use ($userAllergies) {
            foreach ($userAllergies as $allergy) {
                $query->whereRaw('LOWER(allergy_info) NOT LIKE ?', ['%' . strtolower($allergy) . '%']);
            }
        })->orWhereNull('allergy_info')
          ->get();

        // Group foods by category for better organization
        $categorizedFoods = [
            'Proteins' => [],
            'Vegetables' => [],
            'Fruits' => [],
            'Grains' => [],
            'Dairy & Alternatives' => [],
            'Snacks' => []
        ];

        foreach ($suggestedFoods as $food) {
            $category = $this->categorizeFood($food->name);
            if (isset($categorizedFoods[$category])) {
                $categorizedFoods[$category][] = $food;
            }
        }

        return $categorizedFoods;
    }

    /**
     * Categorize a food item based on its name
     *
     * @param string $foodName
     * @return string
     */
    private function categorizeFood(string $foodName)
    {
        $foodName = strtolower($foodName);
        
        if (str_contains($foodName, 'chicken') || 
            str_contains($foodName, 'salmon') || 
            str_contains($foodName, 'tofu') || 
            str_contains($foodName, 'beans') || 
            str_contains($foodName, 'chickpeas')) {
            return 'Proteins';
        }
        
        if (str_contains($foodName, 'broccoli') || 
            str_contains($foodName, 'spinach') || 
            str_contains($foodName, 'sweet potato')) {
            return 'Vegetables';
        }
        
        if (str_contains($foodName, 'apple') || 
            str_contains($foodName, 'banana') || 
            str_contains($foodName, 'avocado')) {
            return 'Fruits';
        }
        
        if (str_contains($foodName, 'rice') || 
            str_contains($foodName, 'quinoa') || 
            str_contains($foodName, 'bread') || 
            str_contains($foodName, 'oatmeal')) {
            return 'Grains';
        }
        
        if (str_contains($foodName, 'yogurt') || 
            str_contains($foodName, 'milk') || 
            str_contains($foodName, 'cheese')) {
            return 'Dairy & Alternatives';
        }
        
        return 'Snacks';
    }
} 