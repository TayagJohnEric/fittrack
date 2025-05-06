<?php

namespace Database\Seeders;

use App\Models\TemplateFoodItem;
use App\Models\FoodSuggestionTemplate;
use App\Models\FoodItem;
use Illuminate\Database\Seeder;

/**
 * Seeds the template_food_items table with food items for each template,
 * including quantities, required status, and alternative groupings.
 */
class TemplateFoodItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get template IDs
        $proteinBreakfastId = FoodSuggestionTemplate::where('name', 'Protein-rich Breakfast')->first()->id;
        $muscleBuilderLunchId = FoodSuggestionTemplate::where('name', 'Muscle Builder Lunch')->first()->id;
        $lightBreakfastId = FoodSuggestionTemplate::where('name', 'Light Breakfast')->first()->id;
        $lowCalDinnerId = FoodSuggestionTemplate::where('name', 'Filling Low-Cal Dinner')->first()->id;
        $preTrainingSnackId = FoodSuggestionTemplate::where('name', 'Pre-Training Snack')->first()->id;
        $recoveryShakeId = FoodSuggestionTemplate::where('name', 'Recovery Shake')->first()->id;
        $postWorkoutMealId = FoodSuggestionTemplate::where('name', 'Post-Workout Meal')->first()->id;
        $enduranceBreakfastId = FoodSuggestionTemplate::where('name', 'Endurance Breakfast')->first()->id;
        $balancedDinnerId = FoodSuggestionTemplate::where('name', 'Balanced Family Dinner')->first()->id;
        $plantProteinLunchId = FoodSuggestionTemplate::where('name', 'Plant Protein Lunch')->first()->id;
        $quickBreakfastId = FoodSuggestionTemplate::where('name', '5-Minute Breakfast')->first()->id;
        $lowCarbDinnerId = FoodSuggestionTemplate::where('name', 'Low-Carb Dinner')->first()->id;

        // Get food IDs
        $eggs = FoodItem::where('name', 'Eggs')->first()->id;
        $wheyProtein = FoodItem::where('name', 'Protein Powder (Whey)')->first()->id;
        $greekYogurt = FoodItem::where('name', 'Greek Yogurt, Plain')->first()->id;
        $oatmeal = FoodItem::where('name', 'Oatmeal')->first()->id;
        $spinach = FoodItem::where('name', 'Spinach')->first()->id;
        $banana = FoodItem::where('name', 'Banana')->first()->id;
        $chickenBreast = FoodItem::where('name', 'Chicken Breast')->first()->id;
        $sweetPotato = FoodItem::where('name', 'Sweet Potato')->first()->id;
        $broccoli = FoodItem::where('name', 'Broccoli')->first()->id;
        $brownRice = FoodItem::where('name', 'Brown Rice')->first()->id;
        $salmon = FoodItem::where('name', 'Salmon')->first()->id;
        $avocado = FoodItem::where('name', 'Avocado')->first()->id;
        $almonds = FoodItem::where('name', 'Almonds')->first()->id;
        $apple = FoodItem::where('name', 'Apple')->first()->id;
        $riceCakes = FoodItem::where('name', 'Rice Cakes')->first()->id;
        $peanutButter = FoodItem::where('name', 'Peanut Butter')->first()->id;
        $coconutWater = FoodItem::where('name', 'Coconut Water')->first()->id;
        $tofu = FoodItem::where('name', 'Tofu, Firm')->first()->id;
        $blackBeans = FoodItem::where('name', 'Black Beans')->first()->id;
        $chickpeas = FoodItem::where('name', 'Chickpeas')->first()->id;
        $wholeWheatBread = FoodItem::where('name', 'Whole Wheat Bread')->first()->id;
        $cheddarCheese = FoodItem::where('name', 'Cheddar Cheese')->first()->id;
        $oliveoil = FoodItem::where('name', 'Olive Oil')->first()->id;
        $proteinBar = FoodItem::where('name', 'Protein Bar')->first()->id;
        $quinoa = FoodItem::where('name', 'Quinoa')->first()->id;
        $chiaSeeds = FoodItem::where('name', 'Chia Seeds')->first()->id;
        $darkChocolate = FoodItem::where('name', 'Dark Chocolate (70% cocoa)')->first()->id;
        $almondMilk = FoodItem::where('name', 'Almond Milk')->first()->id;

        $templateFoodItems = [
            // Protein-rich Breakfast
            [
                'template_id' => $proteinBreakfastId,
                'food_id' => $eggs,
                'suggested_quantity' => 2.0,
                'is_required' => true,
                'alternatives_group_id' => 1,
            ],
            [
                'template_id' => $proteinBreakfastId,
                'food_id' => $greekYogurt,
                'suggested_quantity' => 1.0,
                'is_required' => false,
                'alternatives_group_id' => 1,
            ],
            [
                'template_id' => $proteinBreakfastId,
                'food_id' => $wheyProtein,
                'suggested_quantity' => 1.0,
                'is_required' => false,
                'alternatives_group_id' => 1,
            ],
            [
                'template_id' => $proteinBreakfastId,
                'food_id' => $oatmeal,
                'suggested_quantity' => 1.0,
                'is_required' => true,
                'alternatives_group_id' => 2,
            ],
            [
                'template_id' => $proteinBreakfastId,
                'food_id' => $wholeWheatBread,
                'suggested_quantity' => 2.0,
                'is_required' => false,
                'alternatives_group_id' => 2,
            ],
            [
                'template_id' => $proteinBreakfastId,
                'food_id' => $banana,
                'suggested_quantity' => 1.0,
                'is_required' => false,
                'alternatives_group_id' => null,
            ],
            // Muscle Builder Lunch
            [
                'template_id' => $muscleBuilderLunchId,
                'food_id' => $chickenBreast,
                'suggested_quantity' => 1.5,
                'is_required' => true,
                'alternatives_group_id' => 3,
            ],
            [
                'template_id' => $muscleBuilderLunchId,
                'food_id' => $salmon,
                'suggested_quantity' => 1.0,
                'is_required' => false,
                'alternatives_group_id' => 3,
            ],
            [
                'template_id' => $muscleBuilderLunchId,
                'food_id' => $brownRice,
                'suggested_quantity' => 1.0,
                'is_required' => true,
                'alternatives_group_id' => 4,
            ],
            [
                'template_id' => $muscleBuilderLunchId,
                'food_id' => $sweetPotato,
                'suggested_quantity' => 1.0,
                'is_required' => false,
                'alternatives_group_id' => 4,
            ],
            [
                'template_id' => $muscleBuilderLunchId,
                'food_id' => $broccoli,
                'suggested_quantity' => 1.0,
                'is_required' => true,
                'alternatives_group_id' => null,
            ],
            [
                'template_id' => $muscleBuilderLunchId,
                'food_id' => $oliveoil,
                'suggested_quantity' => 1.0,
                'is_required' => false,
                'alternatives_group_id' => null,
            ],

            // Light Breakfast
            [
                'template_id' => $lightBreakfastId,
                'food_id' => $greekYogurt,
                'suggested_quantity' => 0.5,
                'is_required' => true,
                'alternatives_group_id' => 5,
            ],
            [
                'template_id' => $lightBreakfastId,
                'food_id' => $apple,
                'suggested_quantity' => 1.0,
                'is_required' => true,
                'alternatives_group_id' => 6,
            ],
            [
                'template_id' => $lightBreakfastId,
                'food_id' => $banana,
                'suggested_quantity' => 1.0,
                'is_required' => false,
                'alternatives_group_id' => 6,
            ],
            [
                'template_id' => $lightBreakfastId,
                'food_id' => $almonds,
                'suggested_quantity' => 0.5,
                'is_required' => false,
                'alternatives_group_id' => null,
            ],

            // Filling Low-Cal Dinner
            [
                'template_id' => $lowCalDinnerId,
                'food_id' => $chickenBreast,
                'suggested_quantity' => 1.0,
                'is_required' => true,
                'alternatives_group_id' => 7,
            ],
            [
                'template_id' => $lowCalDinnerId,
                'food_id' => $tofu,
                'suggested_quantity' => 1.5,
                'is_required' => false,
                'alternatives_group_id' => 7,
            ],
            [
                'template_id' => $lowCalDinnerId,
                'food_id' => $broccoli,
                'suggested_quantity' => 2.0,
                'is_required' => true,
                'alternatives_group_id' => 8,
            ],
            [
                'template_id' => $lowCalDinnerId,
                'food_id' => $spinach,
                'suggested_quantity' => 2.0,
                'is_required' => false,
                'alternatives_group_id' => 8,
            ],
            [
                'template_id' => $lowCalDinnerId,
                'food_id' => $sweetPotato,
                'suggested_quantity' => 0.5,
                'is_required' => false,
                'alternatives_group_id' => null,
            ],

            // Pre-Training Snack
            [
                'template_id' => $preTrainingSnackId,
                'food_id' => $banana,
                'suggested_quantity' => 1.0,
                'is_required' => true,
                'alternatives_group_id' => 9,
            ],
            [
                'template_id' => $preTrainingSnackId,
                'food_id' => $apple,
                'suggested_quantity' => 1.0,
                'is_required' => false,
                'alternatives_group_id' => 9,
            ],
            [
                'template_id' => $preTrainingSnackId,
                'food_id' => $peanutButter,
                'suggested_quantity' => 0.5,
                'is_required' => false,
                'alternatives_group_id' => null,
            ],
            [
                'template_id' => $preTrainingSnackId,
                'food_id' => $riceCakes,
                'suggested_quantity' => 2.0,
                'is_required' => false,
                'alternatives_group_id' => null,
            ],
            
            // Recovery Shake
            [
                'template_id' => $recoveryShakeId,
                'food_id' => $wheyProtein,
                'suggested_quantity' => 1.0,
                'is_required' => true,
                'alternatives_group_id' => 10,
            ],
            [
                'template_id' => $recoveryShakeId,
                'food_id' => $greekYogurt,
                'suggested_quantity' => 0.5,
                'is_required' => false,
                'alternatives_group_id' => 10,
            ],
            [
                'template_id' => $recoveryShakeId,
                'food_id' => $banana,
                'suggested_quantity' => 1.0,
                'is_required' => true,
                'alternatives_group_id' => null,
            ],
            [
                'template_id' => $recoveryShakeId,
                'food_id' => $almondMilk,
                'suggested_quantity' => 1.0,
                'is_required' => false,
                'alternatives_group_id' => 11,
            ],
            [
                'template_id' => $recoveryShakeId,
                'food_id' => $coconutWater,
                'suggested_quantity' => 1.0,
                'is_required' => false,
                'alternatives_group_id' => 11,
            ],

            // Post-Workout Meal
            [
                'template_id' => $postWorkoutMealId,
                'food_id' => $chickenBreast,
                'suggested_quantity' => 1.0,
                'is_required' => true,
                'alternatives_group_id' => 12,
            ],
            [
                'template_id' => $postWorkoutMealId,
                'food_id' => $salmon,
                'suggested_quantity' => 1.0,
                'is_required' => false,
                'alternatives_group_id' => 12,
            ],
            [
                'template_id' => $postWorkoutMealId,
                'food_id' => $wheyProtein,
                'suggested_quantity' => 1.0,
                'is_required' => false,
                'alternatives_group_id' => 12,
            ],
            [
                'template_id' => $postWorkoutMealId,
                'food_id' => $sweetPotato,
                'suggested_quantity' => 1.0,
                'is_required' => true,
                'alternatives_group_id' => 13,
            ],
            [
                'template_id' => $postWorkoutMealId,
                'food_id' => $brownRice,
                'suggested_quantity' => 0.75,
                'is_required' => false,
                'alternatives_group_id' => 13,
            ],
            [
                'template_id' => $postWorkoutMealId,
                'food_id' => $broccoli,
                'suggested_quantity' => 1.0,
                'is_required' => false,
                'alternatives_group_id' => null,
            ],

            // Endurance Breakfast
            [
                'template_id' => $enduranceBreakfastId,
                'food_id' => $oatmeal,
                'suggested_quantity' => 1.5,
                'is_required' => true,
                'alternatives_group_id' => 14,
            ],
            [
                'template_id' => $enduranceBreakfastId,
                'food_id' => $wholeWheatBread,
                'suggested_quantity' => 2.0,
                'is_required' => false,
                'alternatives_group_id' => 14,
            ],
            [
                'template_id' => $enduranceBreakfastId,
                'food_id' => $banana,
                'suggested_quantity' => 1.0,
                'is_required' => true,
                'alternatives_group_id' => null,
            ],
            [
                'template_id' => $enduranceBreakfastId,
                'food_id' => $peanutButter,
                'suggested_quantity' => 1.0,
                'is_required' => true,
                'alternatives_group_id' => null,
            ],
            [
                'template_id' => $enduranceBreakfastId,
                'food_id' => $chiaSeeds,
                'suggested_quantity' => 0.5,
                'is_required' => false,
                'alternatives_group_id' => null,
            ],

            // Balanced Family Dinner
            [
                'template_id' => $balancedDinnerId,
                'food_id' => $chickenBreast,
                'suggested_quantity' => 1.0,
                'is_required' => true,
                'alternatives_group_id' => 15,
            ],
            [
                'template_id' => $balancedDinnerId,
                'food_id' => $salmon,
                'suggested_quantity' => 1.0,
                'is_required' => false,
                'alternatives_group_id' => 15,
            ],
            [
                'template_id' => $balancedDinnerId,
                'food_id' => $sweetPotato,
                'suggested_quantity' => 1.0,
                'is_required' => true,
                'alternatives_group_id' => 16,
            ],
            [
                'template_id' => $balancedDinnerId,
                'food_id' => $brownRice,
                'suggested_quantity' => 0.75,
                'is_required' => false,
                'alternatives_group_id' => 16,
            ],
            [
                'template_id' => $balancedDinnerId,
                'food_id' => $broccoli,
                'suggested_quantity' => 1.0,
                'is_required' => true,
                'alternatives_group_id' => 17,
            ],
            [
                'template_id' => $balancedDinnerId,
                'food_id' => $spinach,
                'suggested_quantity' => 2.0,
                'is_required' => false,
                'alternatives_group_id' => 17,
            ],
            [
                'template_id' => $balancedDinnerId,
                'food_id' => $oliveoil,
                'suggested_quantity' => 1.0,
                'is_required' => false,
                'alternatives_group_id' => null,
            ],

            // Plant Protein Lunch
            [
                'template_id' => $plantProteinLunchId,
                'food_id' => $tofu,
                'suggested_quantity' => 1.0,
                'is_required' => true,
                'alternatives_group_id' => 18,
            ],
            [
                'template_id' => $plantProteinLunchId,
                'food_id' => $chickpeas,
                'suggested_quantity' => 1.0,
                'is_required' => false,
                'alternatives_group_id' => 18,
            ],
            [
                'template_id' => $plantProteinLunchId,
                'food_id' => $blackBeans,
                'suggested_quantity' => 1.0,
                'is_required' => false,
                'alternatives_group_id' => 18,
            ],
            [
                'template_id' => $plantProteinLunchId,
                'food_id' => $quinoa,
                'suggested_quantity' => 1.0,
                'is_required' => true,
                'alternatives_group_id' => 19,
            ],
            [
                'template_id' => $plantProteinLunchId,
                'food_id' => $brownRice,
                'suggested_quantity' => 1.0,
                'is_required' => false,
                'alternatives_group_id' => 19,
            ],
            [
                'template_id' => $plantProteinLunchId,
                'food_id' => $spinach,
                'suggested_quantity' => 1.0,
                'is_required' => true,
                'alternatives_group_id' => null,
            ],
            [
                'template_id' => $plantProteinLunchId,
                'food_id' => $avocado,
                'suggested_quantity' => 0.5,
                'is_required' => false,
                'alternatives_group_id' => null,
            ],

            // 5-Minute Breakfast
            [
                'template_id' => $quickBreakfastId,
                'food_id' => $proteinBar,
                'suggested_quantity' => 1.0,
                'is_required' => true,
                'alternatives_group_id' => 20,
            ],
            [
                'template_id' => $quickBreakfastId,
                'food_id' => $greekYogurt,
                'suggested_quantity' => 1.0,
                'is_required' => false,
                'alternatives_group_id' => 20,
            ],
            [
                'template_id' => $quickBreakfastId,
                'food_id' => $banana,
                'suggested_quantity' => 1.0,
                'is_required' => true,
                'alternatives_group_id' => 21,
            ],
            [
                'template_id' => $quickBreakfastId,
                'food_id' => $apple,
                'suggested_quantity' => 1.0,
                'is_required' => false,
                'alternatives_group_id' => 21,
            ],
            [
                'template_id' => $quickBreakfastId,
                'food_id' => $almonds,
                'suggested_quantity' => 0.5,
                'is_required' => false,
                'alternatives_group_id' => null,
            ],

            // Low-Carb Dinner
            [
                'template_id' => $lowCarbDinnerId,
                'food_id' => $salmon,
                'suggested_quantity' => 1.0,
                'is_required' => true,
                'alternatives_group_id' => 22,
            ],
            [
                'template_id' => $lowCarbDinnerId,
                'food_id' => $chickenBreast,
                'suggested_quantity' => 1.5,
                'is_required' => false,
                'alternatives_group_id' => 22,
            ],
            [
                'template_id' => $lowCarbDinnerId,
                'food_id' => $broccoli,
                'suggested_quantity' => 2.0,
                'is_required' => true,
                'alternatives_group_id' => 23,
            ],
            [
                'template_id' => $lowCarbDinnerId,
                'food_id' => $spinach,
                'suggested_quantity' => 2.0,
                'is_required' => false,
                'alternatives_group_id' => 23,
            ],
            [
                'template_id' => $lowCarbDinnerId,
                'food_id' => $avocado,
                'suggested_quantity' => 0.5,
                'is_required' => true,
                'alternatives_group_id' => null,
            ],
            [
                'template_id' => $lowCarbDinnerId,
                'food_id' => $oliveoil,
                'suggested_quantity' => 1.0,
                'is_required' => false,
                'alternatives_group_id' => null,
            ],
        ];

        foreach ($templateFoodItems as $item) {
            TemplateFoodItem::create($item);
        }
    }
}