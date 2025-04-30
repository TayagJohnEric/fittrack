<?php

namespace Database\Seeders;

use App\Models\ExperienceLevel;
use Illuminate\Database\Seeder;

class ExperienceLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $experienceLevels = [
            ['name' => 'Beginner'],
            ['name' => 'Intermediate'],
            ['name' => 'Advanced'],
            ['name' => 'Elite'],
        ];

        foreach ($experienceLevels as $experienceLevel) {
            ExperienceLevel::create($experienceLevel);
        }
    }
}