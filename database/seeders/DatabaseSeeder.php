<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\FoodItem;
use App\Models\FoodSuggestionCategory;
use App\Models\FoodSuggestionTemplate;
use App\Models\TemplateFoodItem;
use App\Models\User;
use App\Models\WorkoutTemplate;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            ActivityLevelSeeder::class,
            FitnessGoalSeeder::class,
            ExperienceLevelSeeder::class,
            WorkoutTypeSeeder::class,
            AllergySeeder::class,
            FoodItemSeeder::class,
            ExerciseSeeder::class,
            WorkoutTemplateSeeder::class,
            AdminUserSeeder::class,
            FoodSuggestionCategorySeeder::class,
            FoodSuggestionTemplateSeeder::class,
            TemplateFoodItemSeeder::class,
        ]);
    }
}
