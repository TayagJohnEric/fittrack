<?php

namespace Database\Seeders;

use App\Models\Exercise;
use Illuminate\Database\Seeder;

class ExerciseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $exercises = [
            // Chest Exercises
            [
                'name' => 'Bench Press',
                'description' => 'Lie on a flat bench with feet flat on the floor. Grip the barbell slightly wider than shoulder-width. Lower the bar to your mid-chest, then press back up to starting position with elbows fully extended.',
                'muscle_group' => 'Chest',
                'equipment_needed' => 'Barbell, Bench',
                'video_url' => 'https://example.com/videos/bench-press.mp4',
            ],
            [
                'name' => 'Incline Dumbbell Press',
                'description' => 'Set bench to 30-45 degree incline. Hold dumbbells at shoulder width. Press the weights up until arms are extended, then lower them back to chest level.',
                'muscle_group' => 'Chest',
                'equipment_needed' => 'Dumbbells, Incline Bench',
                'video_url' => 'https://example.com/videos/incline-dumbbell-press.mp4',
            ],
            [
                'name' => 'Push-Up',
                'description' => 'Start in plank position with hands slightly wider than shoulders. Keep body in straight line from head to heels. Bend elbows to lower chest to floor, then push back up.',
                'muscle_group' => 'Chest',
                'equipment_needed' => 'None',
                'video_url' => 'https://example.com/videos/push-up.mp4',
            ],
            [
                'name' => 'Cable Chest Fly',
                'description' => 'Stand between cable stations with cables set at chest height. Grab handles with palms facing each other. Step forward and extend arms out to sides. Pull handles together in front of chest in hugging motion.',
                'muscle_group' => 'Chest',
                'equipment_needed' => 'Cable Machine',
                'video_url' => 'https://example.com/videos/cable-fly.mp4',
            ],
            
            // Back Exercises
            [
                'name' => 'Pull-Up',
                'description' => 'Hang from a bar with hands slightly wider than shoulder-width, palms facing away. Pull yourself up until chin clears the bar, then lower back down with control.',
                'muscle_group' => 'Back',
                'equipment_needed' => 'Pull-Up Bar',
                'video_url' => 'https://example.com/videos/pull-up.mp4',
            ],
            [
                'name' => 'Bent-Over Barbell Row',
                'description' => 'Stand with feet shoulder-width apart, knees slightly bent. Bend at waist keeping back straight. Grip barbell shoulder-width apart. Pull bar to lower chest/upper abdomen, then lower with control.',
                'muscle_group' => 'Back',
                'equipment_needed' => 'Barbell',
                'video_url' => 'https://example.com/videos/barbell-row.mp4',
            ],
            [
                'name' => 'Lat Pulldown',
                'description' => 'Sit at lat pulldown machine with thighs secured. Grasp bar with wide grip, palms facing away. Pull bar down to upper chest while keeping back straight, then slowly return to starting position.',
                'muscle_group' => 'Back',
                'equipment_needed' => 'Lat Pulldown Machine',
                'video_url' => 'https://example.com/videos/lat-pulldown.mp4',
            ],
            [
                'name' => 'Seated Cable Row',
                'description' => 'Sit at cable row station with feet on platform and knees slightly bent. Grab cable attachment, keeping back straight. Pull handle toward lower abdomen, then slowly extend arms back to starting position.',
                'muscle_group' => 'Back',
                'equipment_needed' => 'Cable Machine',
                'video_url' => 'https://example.com/videos/seated-cable-row.mp4',
            ],
            
            // Leg Exercises
            [
                'name' => 'Squat',
                'description' => 'Stand with feet shoulder-width apart, barbell across upper back. Bend knees and push hips back to lower until thighs are parallel to ground. Push through heels to return to starting position.',
                'muscle_group' => 'Legs',
                'equipment_needed' => 'Barbell',
                'video_url' => 'https://example.com/videos/squat.mp4',
            ],
            [
                'name' => 'Deadlift',
                'description' => 'Stand with feet hip-width apart, barbell over midfoot. Bend at hips and knees to grip bar slightly wider than shoulder-width. Keep back flat, push through heels and stand up straight. Lower bar with control.',
                'muscle_group' => 'Legs',
                'equipment_needed' => 'Barbell',
                'video_url' => 'https://example.com/videos/deadlift.mp4',
            ],
            [
                'name' => 'Leg Press',
                'description' => 'Sit in leg press machine with feet shoulder-width apart on platform. Release safety bars and lower platform until knees form 90-degree angle. Push through heels until legs are extended but not locked.',
                'muscle_group' => 'Legs',
                'equipment_needed' => 'Leg Press Machine',
                'video_url' => 'https://example.com/videos/leg-press.mp4',
            ],
            [
                'name' => 'Walking Lunge',
                'description' => 'Stand straight with feet together. Step forward with one leg and lower hips until both knees form 90-degree angles. Push off front foot to bring other foot forward into next lunge step.',
                'muscle_group' => 'Legs',
                'equipment_needed' => 'None',
                'video_url' => 'https://example.com/videos/walking-lunge.mp4',
            ],
            [
                'name' => 'Romanian Deadlift',
                'description' => 'Stand holding barbell at hip level with slight knee bend. Push hips back while lowering barbell along legs, keeping back straight. Lower until you feel hamstring stretch, then drive hips forward to stand up.',
                'muscle_group' => 'Legs',
                'equipment_needed' => 'Barbell',
                'video_url' => 'https://example.com/videos/romanian-deadlift.mp4',
            ],
            
            // Shoulder Exercises
            [
                'name' => 'Overhead Press',
                'description' => 'Stand with feet shoulder-width apart, barbell at shoulder height with palms forward. Press bar overhead until arms are fully extended. Lower bar back to shoulders with control.',
                'muscle_group' => 'Shoulders',
                'equipment_needed' => 'Barbell',
                'video_url' => 'https://example.com/videos/overhead-press.mp4',
            ],
            [
                'name' => 'Lateral Raise',
                'description' => 'Stand with dumbbells at sides, palms facing in. Keep slight bend in elbows. Raise arms out to sides until parallel with floor. Lower with control.',
                'muscle_group' => 'Shoulders',
                'equipment_needed' => 'Dumbbells',
                'video_url' => 'https://example.com/videos/lateral-raise.mp4',
            ],
            [
                'name' => 'Face Pull',
                'description' => 'Set cable pulley to upper position. Grab rope attachment with overhand grip. Pull rope toward face, separating hands as you pull and squeezing shoulder blades together. Return to start position with control.',
                'muscle_group' => 'Shoulders',
                'equipment_needed' => 'Cable Machine',
                'video_url' => 'https://example.com/videos/face-pull.mp4',
            ],
            
            // Arm Exercises
            [
                'name' => 'Bicep Curl',
                'description' => 'Stand with feet shoulder-width apart, dumbbells at sides with palms forward. Keeping upper arms stationary, bend elbows to curl weights to shoulders. Lower with control.',
                'muscle_group' => 'Arms',
                'equipment_needed' => 'Dumbbells',
                'video_url' => 'https://example.com/videos/bicep-curl.mp4',
            ],
            [
                'name' => 'Tricep Dip',
                'description' => 'Sit on edge of bench or chair with hands next to hips. Slide buttocks off front and support weight with arms. Lower body by bending elbows until upper arms are parallel to floor. Push back up.',
                'muscle_group' => 'Arms',
                'equipment_needed' => 'Bench',
                'video_url' => 'https://example.com/videos/tricep-dip.mp4',
            ],
            [
                'name' => 'Skull Crusher',
                'description' => 'Lie on bench with EZ bar or barbell held above chest, arms extended. Keeping upper arms stationary, bend elbows to lower bar toward forehead. Extend elbows to raise bar back up.',
                'muscle_group' => 'Arms',
                'equipment_needed' => 'EZ Bar, Bench',
                'video_url' => 'https://example.com/videos/skull-crusher.mp4',
            ],
            [
                'name' => 'Hammer Curl',
                'description' => 'Stand with dumbbells at sides, palms facing each other. Keeping upper arms stationary, curl weights toward shoulders. Lower with control.',
                'muscle_group' => 'Arms',
                'equipment_needed' => 'Dumbbells',
                'video_url' => 'https://example.com/videos/hammer-curl.mp4',
            ],
            
            // Core Exercises
            [
                'name' => 'Plank',
                'description' => 'Start in push-up position, then bend elbows 90° and rest weight on forearms. Body should form straight line from head to feet. Hold position while bracing core.',
                'muscle_group' => 'Core',
                'equipment_needed' => 'None',
                'video_url' => 'https://example.com/videos/plank.mp4',
            ],
            [
                'name' => 'Russian Twist',
                'description' => 'Sit on floor with knees bent, feet lifted slightly. Lean back to create 45° angle with torso. Clasp hands or hold weight in front of chest. Rotate torso to right, then to left to complete one rep.',
                'muscle_group' => 'Core',
                'equipment_needed' => 'Optional: Dumbbell or Medicine Ball',
                'video_url' => 'https://example.com/videos/russian-twist.mp4',
            ],
            [
                'name' => 'Hanging Leg Raise',
                'description' => 'Hang from pull-up bar with arms fully extended. Keeping legs straight, raise them until parallel with ground. Lower with control.',
                'muscle_group' => 'Core',
                'equipment_needed' => 'Pull-Up Bar',
                'video_url' => 'https://example.com/videos/hanging-leg-raise.mp4',
            ],
            [
                'name' => 'Ab Rollout',
                'description' => 'Kneel on floor with ab wheel in front of knees. Roll wheel forward, extending body as far as possible without touching floor with stomach. Use core to pull wheel back to starting position.',
                'muscle_group' => 'Core',
                'equipment_needed' => 'Ab Wheel',
                'video_url' => 'https://example.com/videos/ab-rollout.mp4',
            ],
            
            // Cardio Exercises
            [
                'name' => 'Burpee',
                'description' => 'Start standing, then squat and place hands on floor. Jump feet back to plank position. Perform push-up if desired. Jump feet back to squat position, then explode upward into jump with arms overhead.',
                'muscle_group' => 'Full Body',
                'equipment_needed' => 'None',
                'video_url' => 'https://example.com/videos/burpee.mp4',
            ],
            [
                'name' => 'Mountain Climber',
                'description' => 'Start in plank position with arms straight. Alternate driving knees toward chest as if running in place. Keep core tight and hips level throughout movement.',
                'muscle_group' => 'Full Body',
                'equipment_needed' => 'None',
                'video_url' => 'https://example.com/videos/mountain-climber.mp4',
            ],
            [
                'name' => 'Jump Rope',
                'description' => 'Hold rope handles with rope behind you. Swing rope overhead and jump as it passes under feet. Land softly on balls of feet and repeat.',
                'muscle_group' => 'Full Body',
                'equipment_needed' => 'Jump Rope',
                'video_url' => 'https://example.com/videos/jump-rope.mp4',
            ],
            
            // Flexibility/Mobility Exercises
            [
                'name' => 'Hip Flexor Stretch',
                'description' => 'Kneel on one knee with other foot flat on floor in front. Keep back straight and push hips forward until you feel stretch in front of rear hip. Hold position.',
                'muscle_group' => 'Hips',
                'equipment_needed' => 'None',
                'video_url' => 'https://example.com/videos/hip-flexor-stretch.mp4',
            ],
            [
                'name' => 'Downward Dog',
                'description' => 'Start on hands and knees. Lift hips up and back, forming inverted V with body. Press heels toward floor and head between arms. Hold position while breathing deeply.',
                'muscle_group' => 'Full Body',
                'equipment_needed' => 'None',
                'video_url' => 'https://example.com/videos/downward-dog.mp4',
            ],
            [
                'name' => 'Cat-Cow Stretch',
                'description' => 'Start on hands and knees. Inhale, drop belly toward floor while lifting chin and chest (cow). Exhale, round spine upward while tucking chin to chest (cat). Alternate between positions.',
                'muscle_group' => 'Core',
                'equipment_needed' => 'None',
                'video_url' => 'https://example.com/videos/cat-cow.mp4',
            ],
        ];

        foreach ($exercises as $exercise) {
            Exercise::create($exercise);
        }
    }
}