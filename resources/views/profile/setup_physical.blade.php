<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile Setup - Physical Information</title>
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
        /* For number input arrows */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        input[type=number] {
            -moz-appearance: textfield;
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
                        <h1 class="text-xl md:text-2xl font-bold text-gray-800">Profile Setup - Physical Information</h1>
                        <p class="text-sm md:text-base text-gray-500">Let us know your physical measurements to customize your experience.</p>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="flex space-x-1">
                            <div class="h-2 w-2 rounded-full bg-gray-300 opacity-50"></div>
                            <div class="h-2 w-2 rounded-full bg-gray-600"></div>
                            <div class="h-2 w-2 rounded-full bg-gray-300 opacity-50"></div>
                        </div>
                        <span class="text-sm font-medium text-white bg-gray-800 px-3 py-1 rounded-full">Step 2 of 3</span>
                    </div>
                </div>
            </div>
            
            <!-- Card Body -->
            <div class="pt-4 md:pt-6 px-6 md:px-8 pb-6">
                @if (session('error'))
                    <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded mb-4">
                        {{ session('error') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded mb-4">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('profile.setup.physical') }}" class="space-y-6">
                    @csrf
                    
                    <!-- Height (cm) -->
                    <div class="space-y-2">
                        <label for="height_cm" class="block text-gray-800 font-semibold">Height (cm)</label>
                        <input id="height_cm" type="number" 
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-transparent"
                            name="height_cm" value="{{ old('height_cm', $profile->height_cm ?? '') }}" 
                            required min="1" step="1">
                        @error('height_cm')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Current Weight (kg) -->
                    <div class="space-y-2">
                        <label for="current_weight_kg" class="block text-gray-800 font-semibold">Current Weight (kg)</label>
                        <input id="current_weight_kg" type="number" 
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-transparent"
                            name="current_weight_kg" value="{{ old('current_weight_kg', $profile->current_weight_kg ?? '') }}" 
                            required min="1" step="0.1">
                        @error('current_weight_kg')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Form Actions -->
                    <div class="pt-6 border-t border-gray-100">
                        <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                            <a href="{{ route('profile.setup.basics') }}" class="w-full sm:w-auto px-6 py-3 bg-gray-100 text-gray-700 rounded-full font-medium text-sm hover:bg-gray-200 transition-colors duration-300 flex justify-center items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                                Back
                            </a>
                            <button type="submit" class="w-full sm:w-auto px-6 py-3 bg-gray-800 text-white rounded-full font-medium text-sm hover:bg-gray-700 transition-colors duration-300 flex justify-center items-center">
                                Continue to Preferences
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>