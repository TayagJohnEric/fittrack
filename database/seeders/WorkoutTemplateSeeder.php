<?php

namespace Database\Seeders;

use App\Models\WorkoutTemplate;
use App\Models\ExperienceLevel;
use App\Models\WorkoutType;
use Illuminate\Database\Seeder;

class WorkoutTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get IDs for experience levels and workout types
        $beginner = ExperienceLevel::where('name', 'Beginner')->first()->id;
        $intermediate = ExperienceLevel::where('name', 'Intermediate')->first()->id;
        $advanced = ExperienceLevel::where('name', 'Advanced')->first()->id;
        
        $bodybuilding = WorkoutType::where('name', 'Bodybuilding')->first()->id;
        $powerlifting = WorkoutType::where('name', 'Powerlifting')->first()->id;
        $crossfit = WorkoutType::where('name', 'CrossFit')->first()->id;
        $calisthenics = WorkoutType::where('name', 'Calisthenics')->first()->id;
        $hiit = WorkoutType::where('name', 'HIIT')->first()->id;
        $functionalTraining = WorkoutType::where('name', 'Functional Training')->first()->id;
        
        $workoutTemplates = [
            // Beginner Templates
            [
                'name' => 'Beginner Full Body',
                'description' => 'A comprehensive full-body workout perfect for beginners to build foundational strength and learn proper form for key exercises.',
                'experience_level_id' => $beginner,
                'workout_type_id' => $bodybuilding,
                'is_generic' => true, // Mark as generic template
            ],
            [
                'name' => 'Beginner Push/Pull Split',
                'description' => 'A simple two-day split focusing on pushing and pulling movements, ideal for beginners to learn basic movement patterns.',
                'experience_level_id' => $beginner,
                'workout_type_id' => $bodybuilding,
                'is_generic' => false,
            ],
            [
                'name' => 'Beginner Calisthenics',
                'description' => 'A bodyweight-focused routine perfect for beginners to build foundational strength using minimal equipment.',
                'experience_level_id' => $beginner,
                'workout_type_id' => $calisthenics,
                'is_generic' => true, // Mark as generic template
            ],
            [
                'name' => 'Beginner HIIT Workout',
                'description' => 'A simple high-intensity interval training workout designed for beginners to build basic conditioning.',
                'experience_level_id' => $beginner,
                'workout_type_id' => $hiit,
                'is_generic' => false,
            ],
            [
                'name' => 'Beginner Functional Full Body',
                'description' => 'An easy-to-follow full-body routine that incorporates mobility, balance, and strength exercises for functional movement.',
                'experience_level_id' => $beginner,
                'workout_type_id' => $functionalTraining,
                'is_generic' => false,
            ],
            [
                'name' => 'Beginner CrossFit Starter',
                'description' => 'A low-intensity intro to CrossFit with scaled WODs (Workouts of the Day) focused on technique and endurance.',
                'experience_level_id' => $beginner,
                'workout_type_id' => $crossfit,
                'is_generic' => false,
            ],
            
            // Intermediate Templates
            [
                'name' => 'Intermediate Upper/Lower Split',
                'description' => 'A four-day split targeting upper and lower body on alternate days for balanced muscle development.',
                'experience_level_id' => $intermediate,
                'workout_type_id' => $bodybuilding,
                'is_generic' => true, // Mark as generic template
            ],
            [
                'name' => 'Intermediate Push/Pull/Legs',
                'description' => 'A three-day split dividing workouts into pushing movements, pulling movements, and leg exercises for targeted muscle growth.',
                'experience_level_id' => $intermediate,
                'workout_type_id' => $bodybuilding,
                'is_generic' => false,
            ],
            [
                'name' => 'Intermediate Powerlifting',
                'description' => 'A strength-focused program centered around the three main lifts: squat, bench press, and deadlift.',
                'experience_level_id' => $intermediate,
                'workout_type_id' => $powerlifting,
                'is_generic' => true, // Mark as generic template
            ],
            [
                'name' => 'Intermediate Functional Circuit',
                'description' => 'A challenging circuit combining strength and conditioning exercises to improve overall fitness and athleticism.',
                'experience_level_id' => $intermediate,
                'workout_type_id' => $functionalTraining,
                'is_generic' => false,
            ],
            [
                'name' => 'Intermediate 5x5 Strength Program',
                'description' => 'A strength training program based on 5 sets of 5 reps for compound lifts, promoting strength and size gains.',
                'experience_level_id' => $intermediate,
                'workout_type_id' => $powerlifting,
                'is_generic' => true,
            ],
            [
                'name' => 'Intermediate Hybrid Training',
                'description' => 'A mix of strength, hypertrophy, and conditioning, suitable for athletes looking to build muscle and stay fit.',
                'experience_level_id' => $intermediate,
                'workout_type_id' => $functionalTraining,
                'is_generic' => true,
            ],
            [
                'name' => 'Intermediate Calisthenics Flow',
                'description' => 'A dynamic routine incorporating intermediate-level bodyweight exercises with mobility flows.',
                'experience_level_id' => $intermediate,
                'workout_type_id' => $calisthenics,
                'is_generic' => false,
            ],

            
            // Advanced Templates
            [
                'name' => 'Advanced Bodybuilding Split',
                'description' => 'A five-day body part split for experienced lifters focused on hypertrophy and muscular definition.',
                'experience_level_id' => $advanced,
                'workout_type_id' => $bodybuilding,
                'is_generic' => true, // Mark as generic template
            ],
            [
                'name' => 'Advanced Powerlifting Program',
                'description' => 'A specialized program for experienced lifters focusing on maximal strength in the squat, bench press, and deadlift.',
                'experience_level_id' => $advanced,
                'workout_type_id' => $powerlifting,
                'is_generic' => false,
            ],
            [
                'name' => 'Advanced CrossFit WOD Series',
                'description' => 'A collection of challenging CrossFit workouts of the day designed for experienced athletes.',
                'experience_level_id' => $advanced,
                'workout_type_id' => $crossfit,
                'is_generic' => true, // Mark as generic template
            ],
            [
                'name' => 'Advanced Calisthenics Skills',
                'description' => 'A program focused on advanced bodyweight skills and movements for experienced athletes.',
                'experience_level_id' => $advanced,
                'workout_type_id' => $calisthenics,
                'is_generic' => false,
            ],
            [
                'name' => 'Advanced DUP Powerbuilding',
                'description' => 'A daily undulating periodization program blending strength and hypertrophy across the week.',
                'experience_level_id' => $advanced,
                'workout_type_id' => $bodybuilding,
                'is_generic' => false,
            ],
            [
                'name' => 'Advanced HIIT & Strength Fusion',
                'description' => 'A demanding hybrid of strength lifting and high-intensity intervals for maximal fat loss and performance.',
                'experience_level_id' => $advanced,
                'workout_type_id' => $hiit,
                'is_generic' => true,
            ],
            [
                'name' => 'Advanced Gymnastics Calisthenics',
                'description' => 'Focuses on advanced gymnastic elements like front lever, planche, and muscle-ups for body control and strength.',
                'experience_level_id' => $advanced,
                'workout_type_id' => $calisthenics,
                'is_generic' => true,
            ],
            [
                'name' => 'Advanced Olympic Lifting Program',
                'description' => 'A structured training plan for experienced lifters to improve performance in the snatch and clean & jerk.',
                'experience_level_id' => $advanced,
                'workout_type_id' => $functionalTraining,
                'is_generic' => false,
            ],
        ];

        foreach ($workoutTemplates as $template) {
            WorkoutTemplate::create($template);
        }
    }
}