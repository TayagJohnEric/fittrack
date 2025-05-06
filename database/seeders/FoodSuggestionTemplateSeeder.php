<?php

namespace Database\Seeders;

use App\Models\FoodSuggestionTemplate;
use App\Models\FoodSuggestionCategory;
use App\Models\ExperienceLevel;
use Illuminate\Database\Seeder;

/**
 * Seeds the food_suggestion_templates table with predefined templates
 * organized by categories and experience levels.
 */
class FoodSuggestionTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $beginnerLevel = ExperienceLevel::where('name', 'Beginner')->first()->id;
        $intermediateLevel = ExperienceLevel::where('name', 'Intermediate')->first()->id;
        $advancedLevel = ExperienceLevel::where('name', 'Advanced')->first()->id;
        
        $highProtein = FoodSuggestionCategory::where('name', 'High Protein')->first()->id;
        $lowCalorie = FoodSuggestionCategory::where('name', 'Low Calorie')->first()->id;
        $preWorkout = FoodSuggestionCategory::where('name', 'Pre-Workout')->first()->id;
        $postWorkout = FoodSuggestionCategory::where('name', 'Post-Workout')->first()->id;
        $endurance = FoodSuggestionCategory::where('name', 'Endurance Support')->first()->id;
        $balanced = FoodSuggestionCategory::where('name', 'Balanced Nutrition')->first()->id;
        $maintenance = FoodSuggestionCategory::where('name', 'Maintenance')->first()->id;
        $performance = FoodSuggestionCategory::where('name', 'Performance Nutrition')->first()->id;
        $recomp = FoodSuggestionCategory::where('name', 'Recomposition')->first()->id;
        $plantBased = FoodSuggestionCategory::where('name', 'Plant-Based')->first()->id;
        $quickEasy = FoodSuggestionCategory::where('name', 'Quick & Easy')->first()->id;
        $lowCarb = FoodSuggestionCategory::where('name', 'Low Carb')->first()->id;

        $templates = [
            [
                'category_id' => $highProtein,
                'name' => 'Protein-rich Breakfast',
                'description' => 'A high-protein breakfast to kickstart your day and support muscle growth.',
                'target_meal_type' => 'Breakfast',
                'min_experience_level_id' => $beginnerLevel,
            ],
            [
                'category_id' => $highProtein,
                'name' => 'Muscle Builder Lunch',
                'description' => 'A balanced lunch with optimal protein for muscle recovery and growth.',
                'target_meal_type' => 'Lunch',
                'min_experience_level_id' => $beginnerLevel,
            ],
            [
                'category_id' => $lowCalorie,
                'name' => 'Light Breakfast',
                'description' => 'A nutritious, lower-calorie breakfast that still provides energy for the day.',
                'target_meal_type' => 'Breakfast',
                'min_experience_level_id' => $beginnerLevel,
            ],
            [
                'category_id' => $lowCalorie,
                'name' => 'Filling Low-Cal Dinner',
                'description' => 'A satisfying dinner with reduced calories but plenty of nutrients and fiber.',
                'target_meal_type' => 'Dinner',
                'min_experience_level_id' => $beginnerLevel,
            ],
            [
                'category_id' => $preWorkout,
                'name' => 'Pre-Training Snack',
                'description' => 'A light, energizing snack to consume 30-60 minutes before working out.',
                'target_meal_type' => 'Snack',
                'min_experience_level_id' => $beginnerLevel,
            ],
            [
                'category_id' => $postWorkout,
                'name' => 'Recovery Shake',
                'description' => 'A nutrient-dense shake to consume within 30 minutes after workout.',
                'target_meal_type' => 'Snack',
                'min_experience_level_id' => $beginnerLevel,
            ],
            [
                'category_id' => $postWorkout,
                'name' => 'Post-Workout Meal',
                'description' => 'A balanced meal with optimal protein and carbs for maximum recovery.',
                'target_meal_type' => 'Any',
                'min_experience_level_id' => $beginnerLevel,
            ],
            [
                'category_id' => $endurance,
                'name' => 'Endurance Breakfast',
                'description' => 'A carbohydrate-rich breakfast to fuel long training sessions.',
                'target_meal_type' => 'Breakfast',
                'min_experience_level_id' => $intermediateLevel,
            ],
            [
                'category_id' => $balanced,
                'name' => 'Balanced Family Dinner',
                'description' => 'A nutritionally complete dinner with appropriate portions of all food groups.',
                'target_meal_type' => 'Dinner',
                'min_experience_level_id' => $beginnerLevel,
            ],
            [
                'category_id' => $maintenance,
                'name' => 'Maintenance Lunch',
                'description' => 'A perfectly portioned lunch to maintain current weight and energy levels.',
                'target_meal_type' => 'Lunch',
                'min_experience_level_id' => $beginnerLevel,
            ],
            [
                'category_id' => $performance,
                'name' => 'Competition Day Breakfast',
                'description' => 'An easily digestible, energy-rich breakfast for competition days.',
                'target_meal_type' => 'Breakfast',
                'min_experience_level_id' => $advancedLevel,
            ],
            [
                'category_id' => $recomp,
                'name' => 'Recomp Dinner',
                'description' => 'A protein-rich, moderate carb dinner to support body recomposition goals.',
                'target_meal_type' => 'Dinner',
                'min_experience_level_id' => $intermediateLevel,
            ],
            [
                'category_id' => $plantBased,
                'name' => 'Plant Protein Lunch',
                'description' => 'A satisfying plant-based lunch with complete protein sources.',
                'target_meal_type' => 'Lunch',
                'min_experience_level_id' => $beginnerLevel,
            ],
            [
                'category_id' => $quickEasy,
                'name' => '5-Minute Breakfast',
                'description' => 'A nutritious breakfast that can be prepared in 5 minutes or less.',
                'target_meal_type' => 'Breakfast',
                'min_experience_level_id' => $beginnerLevel,
            ],
            [
                'category_id' => $quickEasy,
                'name' => 'No-Cook Lunch',
                'description' => 'A ready-to-eat lunch requiring minimal preparation time.',
                'target_meal_type' => 'Lunch',
                'min_experience_level_id' => $beginnerLevel,
            ],
            [
                'category_id' => $lowCarb,
                'name' => 'Low-Carb Dinner',
                'description' => 'A satisfying dinner with minimal carbohydrates, focused on protein and vegetables.',
                'target_meal_type' => 'Dinner',
                'min_experience_level_id' => $intermediateLevel,
            ],
        ];

        foreach ($templates as $template) {
            FoodSuggestionTemplate::create($template);
        }
    }
}

