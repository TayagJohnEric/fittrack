<?php

namespace Database\Seeders;

use App\Models\FitnessGoal;
use Illuminate\Database\Seeder;

class FitnessGoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fitnessGoals = [
            ['name' => 'Weight Loss'],
            ['name' => 'Muscle Gain'],
            ['name' => 'Strength Building'],
            ['name' => 'Improve Endurance'],
            ['name' => 'Increase Flexibility'],
            ['name' => 'Improve General Fitness'],
            ['name' => 'Maintain Current Fitness'],
            ['name' => 'Athletic Performance'],
            ['name' => 'Body Recomposition'],
        ];

        foreach ($fitnessGoals as $fitnessGoal) {
            FitnessGoal::create($fitnessGoal);
        }
    }
}