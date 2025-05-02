<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile Setup - Lifestyle & Preferences</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.13.3/cdn.min.js" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        /* Custom styles for the layout */
        body {
            font-family: 'Inter', sans-serif;
        }
        .sidebar {
            transition: transform 0.3s ease-in-out;
        }
        </style>
</head>
<body class="bg-white min-h-screen flex items-center justify-center p-4">
    <div class="container max-w-4xl">
        <div class="bg-white rounded-xl  overflow-hidden">
    
            <!-- Card Header -->
            <div class="bg-white pt-4 pb-2 px-4"> 
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                    <div class="mb-4">
                        <h1 class="text-xl md:text-2xl font-bold text-gray-800">Profile Setup - Lifestyle & Preferences</h1>
                        <p class="text-sm md:text-base text-gray-500">Tell us more about your daily habits and what matters most to you.</p>
                      </div>
                                          <div class="flex items-center space-x-3">
                        <div class="flex space-x-1">
                            <div class="h-2 w-2 rounded-full bg-gray-300 opacity-50"></div>
                            <div class="h-2 w-2 rounded-full bg-gray-300 opacity-50"></div>
                            <div class="h-2 w-2 rounded-full bg-gray-600"></div>
                        </div>
                        <span class="text-sm font-medium text-white bg-gray-800  px-3 py-1 rounded-full">Step 3 of 3</span>
                    </div>
                </div>
            </div>
            
            <!-- Card Body -->
            <div class="pt-4 md:pt-6 px-6 md:px-8 pb-6">
                <form method="POST" action="{{ route('profile.setup.preferences.store') }}" class="space-y-10">
                    @csrf
                    
                <!-- Activity Level -->
<div x-data="{ selected: '{{ old('activity_level_id', $profile->activity_level_id ?? '') }}' }" class="space-y-4">
    <label id="activity-level-label" class="block text-gray-800 font-semibold mb-3">Activity Level</label>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
        @foreach($activityLevels as $level)
        <div>
            <input type="radio" name="activity_level_id" id="activity_{{ $level->id }}" value="{{ $level->id }}" 
                x-model="selected"
                class="peer sr-only" required>
            <label for="activity_{{ $level->id }}" 
                class="flex justify-center items-center font-medium text-sm px-4 py-3 text-center border-2 border-gray-200 rounded-full cursor-pointer transition-all duration-200 
                peer-checked:border-gray-800 peer-checked:bg-gray-800 peer-checked:text-white 
                  hover:border-gray-800"
                :class="selected == '{{ $level->id }}' ? 'border-gray-800 bg-gray-800 text-white' : ''"
                >
                {{ $level->name }}
            </label>
        </div>
        @endforeach
    </div>
    @error('activity_level_id')
    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
                    
                 <!-- Primary Fitness Goal -->
<div x-data="{ selected: '{{ old('fitness_goal_id', $profile->fitness_goal_id ?? '') }}' }" class="space-y-4">
    <label id="fitness-goal-label" class="block text-gray-800 font-semibold mb-3">Primary Fitness Goal</label>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
        @foreach($fitnessGoals as $goal)
        <div>
            <input type="radio" name="fitness_goal_id" id="goal_{{ $goal->id }}" value="{{ $goal->id }}" 
                x-model="selected"
                class="peer sr-only" required>
            <label for="goal_{{ $goal->id }}" 
                class="flex justify-center items-center font-medium text-sm px-4 py-3 text-center border-2 rounded-full cursor-pointer transition-all duration-200 
                peer-checked:border-gray-800 peer-checked:bg-gray-800 peer-checked:text-white 
                 hover:border-gray-800 border-gray-200"
                :class="selected == '{{ $goal->id }}' ? 'border-gray-800 bg-gray-800 text-white' : ''"
                >
                {{ $goal->name }}
            </label>
        </div>
        @endforeach
    </div>
    @error('fitness_goal_id')
    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
                    
<!-- Experience Level -->
<div x-data="{ selected: '{{ old('experience_level_id', $profile->experience_level_id ?? '') }}' }" class="space-y-4">
    <label id="experience-level-label" class="block text-gray-800 font-semibold mb-3">Experience Level</label>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
        @foreach($experienceLevels as $level)
        <div>
            <input type="radio" name="experience_level_id" id="experience_{{ $level->id }}" value="{{ $level->id }}" 
                x-model="selected"
                class="peer sr-only" required>
            <label for="experience_{{ $level->id }}" 
                class="flex justify-center items-center font-medium text-sm px-4 py-3 text-center border-2 rounded-full cursor-pointer transition-all duration-200 
                peer-checked:border-gray-800 peer-checked:bg-gray-800 peer-checked:text-white 
               hover:border-gray-800 border-gray-200"
                :class="selected == '{{ $level->id }}' ? 'border-gray-800 bg-gray-800 text-white' : ''"
                >
                {{ $level->name }}
            </label>
        </div>
        @endforeach
    </div>
    @error('experience_level_id')
    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

                    
                   <!-- Preferred Workout Type -->
<div x-data="{ selected: '{{ old('workout_type_id', $profile->workout_type_id ?? '') }}' }" class="space-y-4">
    <label id="workout-type-label" class="block text-gray-800 font-semibold mb-3">Preferred Workout Type</label>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
        @foreach($workoutTypes as $type)
        <div>
            <input type="radio" name="workout_type_id" id="workout_{{ $type->id }}" value="{{ $type->id }}" 
                x-model="selected"
                class="peer sr-only" required>
            <label for="workout_{{ $type->id }}" 
                class="flex justify-center items-center font-medium text-sm px-4 py-3 text-center border-2 rounded-full cursor-pointer transition-all duration-200 
                peer-checked:border-gray-800 peer-checked:bg-gray-800 peer-checked:text-white 
                 hover:border-gray-800 border-gray-200"
                :class="selected == '{{ $type->id }}' ? 'border-gray-800 bg-gray-800 text-white' : ''"
                >
                {{ $type->name }}
            </label>
        </div>
        @endforeach
    </div>
    @error('workout_type_id')
    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
                    
                    <!-- Known Allergies -->
                    <div class="space-y-4">
                        <label id="allergies-label" class="block text-gray-800 font-semibold mb-3">Known Allergies</label>
                        <div class=" rounded-lg p-4 max-h-60 overflow-y-auto bg-white">
                            <fieldset aria-labelledby="allergies-label" class="space-y-3">
                                @foreach($allergies as $allergy)
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="allergy_{{ $allergy->id }}" name="allergies[]" type="checkbox" value="{{ $allergy->id }}" 
                                            {{ in_array($allergy->id, old('allergies', $userAllergies) ?: []) ? 'checked' : '' }}
                                            class="focus:ring-gray-500 h-5 w-5 text-gray-600 border-gray-300 rounded-full">
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="allergy_{{ $allergy->id }}" class="font-medium text-gray-700">{{ $allergy->name }}</label>
                                    </div>
                                </div>
                                @endforeach
                            </fieldset>
                        </div>
                        <p class="mt-2 text-sm text-gray-500">Select all that apply</p>
                        @error('allergies')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Form Actions -->
                    <div class="pt-6 border-t border-gray-100">
                        <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                            <a href="{{ route('profile.setup.physical') }}" class="w-full sm:w-auto px-6 py-3 bg-gray-100 text-gray-700 rounded-full font-medium text-sm hover:bg-gray-200 transition-colors duration-300 flex justify-center items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                                Back
                            </a>
                            <button type="submit" class="w-full sm:w-auto px-6 py-3 bg-gray-800 text-white rounded-full font-medium text-sm hover:bg-gray-700 transition-colors duration-300 flex justify-center items-center">
                                Complete 
                                <svg class="w-4 h-4 ml-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                  xmlns="http://www.w3.org/2000/svg">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                                </svg>
                              </button>
                              
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>