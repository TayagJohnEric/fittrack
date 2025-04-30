<?php

namespace Database\Seeders;

use App\Models\ActivityLevel;
use Illuminate\Database\Seeder;

class ActivityLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $activityLevels = [
            [
                'name' => 'Sedentary',
                'description' => 'Little to no exercise, desk job',
              
            ],
            [
                'name' => 'Lightly Active',
                'description' => 'Light exercise 1-3 days per week',
                
            ],
            [
                'name' => 'Moderately Active',
                'description' => 'Moderate exercise 3-5 days per week',
               
            ],
            [
                'name' => 'Very Active',
                'description' => 'Hard exercise 6-7 days per week',
              
            ],
            [
                'name' => 'Extremely Active',
                'description' => 'Physical job or twice daily training',
                
            ],
        ];

        foreach ($activityLevels as $activityLevel) {
            ActivityLevel::create($activityLevel);
        }
    }
}