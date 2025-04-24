<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class TestUserMethods extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:user-methods';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test the User model methods for calculating daily calories and BMI';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Testing User model methods...');
        
        // Get the first user
        $user = User::first();
        
        if (!$user) {
            $this->error('No user found in the database.');
            return 1;
        }
        
        $this->info("\nTesting user: {$user->name} (ID: {$user->id})");
        
        // Test calculateDailyCalories
        $this->info("\nTesting calculateDailyCalories()...");
        $calories = $user->calculateDailyCalories();
        if ($calories === null) {
            $this->warn('calculateDailyCalories() returned null - check the logs for details');
        } else {
            $this->info("Daily calories calculated: {$calories}");
        }
        
        // Test getCurrentBmi
        $this->info("\nTesting getCurrentBmi()...");
        $bmi = $user->getCurrentBmi();
        if ($bmi === null) {
            $this->warn('getCurrentBmi() returned null - check the logs for details');
        } else {
            $this->info("BMI calculated: {$bmi}");
        }
        
        // Check profile status
        $this->info("\nProfile status:");
        if ($user->profile) {
            $this->info('Profile exists');
            $this->table(
                ['Field', 'Value'],
                [
                    ['First Name', $user->profile->first_name ?? 'Not set'],
                    ['Last Name', $user->profile->last_name ?? 'Not set'],
                    ['Date of Birth', $user->profile->date_of_birth ?? 'Not set'],
                    ['Sex', $user->profile->sex ?? 'Not set'],
                    ['Height (cm)', $user->profile->height_cm ?? 'Not set'],
                    ['Weight (kg)', $user->profile->current_weight_kg ?? 'Not set'],
                    ['Activity Level', $user->profile->activityLevel->name ?? 'Not set'],
                ]
            );
        } else {
            $this->warn('No profile found for this user');
        }
        
        return 0;
    }
}
