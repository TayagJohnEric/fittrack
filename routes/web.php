<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ActivityLevelController;
use App\Http\Controllers\Admin\FitnessGoalController;
use App\Http\Controllers\Admin\ExperienceLevelController;
use App\Http\Controllers\Admin\WorkoutTypeController;
use App\Http\Controllers\Admin\AllergyController;
use App\Http\Controllers\ProfileSetupController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OnboardingController;



Route::get('/', function () {
    return view('welcome');
});



Route::get('/onlyadmin', function () {
    return view('admin.dashboard');
});


// Public routes for lookup tables
Route::prefix('admin')->name('admin.')->group(function () {
    // Activity Levels
    Route::get('/activity-levels', [ActivityLevelController::class, 'index'])->name('activity-levels.index');
    Route::post('/activity-levels', [ActivityLevelController::class, 'store'])->name('activity-levels.store');
    Route::delete('/activity-levels/{activityLevel}', [ActivityLevelController::class, 'destroy'])->name('activity-levels.destroy');

    // Fitness Goals
    Route::get('/fitness-goals', [FitnessGoalController::class, 'index'])->name('fitness-goals.index');
    Route::post('/fitness-goals', [FitnessGoalController::class, 'store'])->name('fitness-goals.store');
    Route::delete('/fitness-goals/{fitnessGoal}', [FitnessGoalController::class, 'destroy'])->name('fitness-goals.destroy');

    // Experience Levels
    Route::get('/experience-levels', [ExperienceLevelController::class, 'index'])->name('experience-levels.index');
    Route::post('/experience-levels', [ExperienceLevelController::class, 'store'])->name('experience-levels.store');
    Route::delete('/experience-levels/{experienceLevel}', [ExperienceLevelController::class, 'destroy'])->name('experience-levels.destroy');

    // Workout Types
    Route::get('/workout-types', [WorkoutTypeController::class, 'index'])->name('workout-types.index');
    Route::post('/workout-types', [WorkoutTypeController::class, 'store'])->name('workout-types.store');
    Route::delete('/workout-types/{workoutType}', [WorkoutTypeController::class, 'destroy'])->name('workout-types.destroy');

    // Allergies
    Route::get('/allergies', [AllergyController::class, 'index'])->name('allergies.index');
    Route::post('/allergies', [AllergyController::class, 'store'])->name('allergies.store');
    Route::delete('/allergies/{allergy}', [AllergyController::class, 'destroy'])->name('allergies.destroy');
});













// Authentication routes
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

/// Add these routes to your existing routes file
Route::middleware(['auth'])->group(function () {
    // Profile setup routes
    Route::prefix('profile/setup')->name('profile.setup.')->group(function () {
        Route::get('/basics', [App\Http\Controllers\ProfileSetupController::class, 'showBasics'])->name('basics');
        Route::post('/basics', [App\Http\Controllers\ProfileSetupController::class, 'storeBasics']);
        Route::get('/physical', [App\Http\Controllers\ProfileSetupController::class, 'showPhysical'])->name('physical');
        Route::post('/physical', [App\Http\Controllers\ProfileSetupController::class, 'storePhysical']);
        Route::get('/preferences', [App\Http\Controllers\ProfileSetupController::class, 'showPreferences'])->name('preferences');
        Route::post('/preferences', [App\Http\Controllers\ProfileSetupController::class, 'storePreferences'])->name('preferences.store');
    });
    
    // Onboarding route (no onboarding middleware to prevent redirect loops)
    Route::get('/onboarding', [App\Http\Controllers\OnboardingController::class, 'processOnboarding'])
        ->name('onboarding.process');
        
    // Routes that require onboarding to be completed
    Route::middleware(['onboarding'])->group(function () {
        // Dashboard route
        Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])
            ->name('dashboard');
            
        // Other authenticated routes that require completed onboarding
        // ...
    });
});

