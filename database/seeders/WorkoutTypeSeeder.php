<?php

namespace Database\Seeders;

use App\Models\WorkoutType;
use Illuminate\Database\Seeder;

class WorkoutTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $workoutTypes = [
            ['name' => 'Bodybuilding'],
            ['name' => 'Powerlifting'],
            ['name' => 'CrossFit'],
            ['name' => 'Calisthenics'],
            ['name' => 'HIIT'],
            ['name' => 'Functional Training'],
        ];

        foreach ($workoutTypes as $workoutType) {
            WorkoutType::create($workoutType);
        }
    }
}