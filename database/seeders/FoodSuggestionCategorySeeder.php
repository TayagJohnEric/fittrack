<?php

namespace Database\Seeders;

use App\Models\FoodSuggestionCategory;
use App\Models\FitnessGoal;
use Illuminate\Database\Seeder;

/**
 * Seeds the food_suggestion_categories table with predefined categories
 * linked to fitness goals where applicable.
 */
class FoodSuggestionCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $weightLossId = FitnessGoal::where('name', 'Weight Loss')->first()->id;
$muscleGainId = FitnessGoal::where('name', 'Muscle Gain')->first()->id;
$strengthBuildingId = FitnessGoal::where('name', 'Strength Building')->first()->id;
$flexibilityId = FitnessGoal::where('name', 'Increase Flexibility')->first()->id;
$enduranceId = FitnessGoal::where('name', 'Improve Endurance')->first()->id;
$generalFitnessId = FitnessGoal::where('name', 'Improve General Fitness')->first()->id;
$maintainId = FitnessGoal::where('name', 'Maintain Current Fitness')->first()->id;
$athleticId = FitnessGoal::where('name', 'Athletic Performance')->first()->id;
$recompId = FitnessGoal::where('name', 'Body Recomposition')->first()->id;

$categories = [
[
'name' => 'High Protein',
'description' => 'Food combinations with substantial protein content to support muscle repair and growth.',
'fitness_goal_id' => $muscleGainId,
],
[
'name' => 'Low Calorie',
'description' => 'Nutritious, filling meals with reduced caloric content to support weight loss goals.',
'fitness_goal_id' => $weightLossId,
],
[
'name' => 'Low Carb',
'description' => 'Meals with reduced carbohydrate content, focusing on protein and healthy fats.',
'fitness_goal_id' => $weightLossId,
],
[
'name' => 'Strength Support',
'description' => 'Meals rich in nutrients to support strength and power development.',
'fitness_goal_id' => $strengthBuildingId,
],
[
'name' => 'Flexibility Support',
'description' => 'Anti-inflammatory and hydration-focused meals to support joint and muscle flexibility.',
'fitness_goal_id' => $flexibilityId,
],
[
'name' => 'Pre-Workout',
'description' => 'Balanced nutrition to fuel workouts with sustainable energy.',
'fitness_goal_id' => null,
],
[
'name' => 'Post-Workout',
'description' => 'Recovery-focused nutrition with optimal protein-to-carb ratios.',
'fitness_goal_id' => null,
],
[
'name' => 'Endurance Support',
'description' => 'Carbohydrate-focused meals to support energy needs for endurance activities.',
'fitness_goal_id' => $enduranceId,
],
[
'name' => 'Balanced Nutrition',
'description' => 'Well-rounded meals with appropriate macronutrient distribution for general health.',
'fitness_goal_id' => $generalFitnessId,
],
[
'name' => 'Maintenance',
'description' => 'Balanced meals designed to maintain current body composition.',
'fitness_goal_id' => $maintainId,
],
[
'name' => 'Performance Nutrition',
'description' => 'Optimized nutrition to support athletic performance and recovery.',
'fitness_goal_id' => $athleticId,
],
[
'name' => 'Recomposition',
'description' => 'Strategic nutrition to support fat loss while preserving or building muscle.',
'fitness_goal_id' => $recompId,
],
[
'name' => 'Plant-Based',
'description' => 'Nutrient-dense vegetarian and vegan meal options.',
'fitness_goal_id' => null,
],
[
'name' => 'Quick & Easy',
'description' => 'Simple, time-efficient meal options for busy lifestyles.',
'fitness_goal_id' => null,
],
];

        foreach ($categories as $category) {
            FoodSuggestionCategory::create($category);
        }
    }
}