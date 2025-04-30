<?php

namespace Database\Seeders;

use App\Models\User;
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
            FoodItemSeeder::class, // Added food item seeder
        ]);
    }
}
