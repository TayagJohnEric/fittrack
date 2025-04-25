<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile Setup - Basic Information</title>
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
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="container max-w-4xl">
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
    
            <!-- Card Header -->
            <div class="bg-white pt-4 pb-2 px-4"> 
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                    <div class="mb-4">
                        <h1 class="text-xl md:text-2xl font-bold text-gray-800">Profile Setup - Basic Information</h1>
                        <p class="text-sm md:text-base text-gray-500">Let's start with your basic personal details.</p>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="flex space-x-1">
                            <div class="h-2 w-2 rounded-full bg-gray-600"></div>
                            <div class="h-2 w-2 rounded-full bg-gray-300 opacity-50"></div>
                            <div class="h-2 w-2 rounded-full bg-gray-300 opacity-50"></div>
                        </div>
                        <span class="text-sm font-medium text-white bg-gray-800 px-3 py-1 rounded-full">Step 1 of 3</span>
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

                <form method="POST" action="{{ route('profile.setup.basics') }}" class="space-y-6">
                    @csrf
                    
                    <!-- First Name -->
                    <div class="space-y-2">
                        <label for="first_name" class="block text-gray-800 font-semibold">First Name</label>
                        <input id="first_name" type="text" 
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-transparent"
                            name="first_name" value="{{ old('first_name', $profile->first_name ?? '') }}" 
                            required autocomplete="given-name" autofocus>
                        @error('first_name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Last Name -->
                    <div class="space-y-2">
                        <label for="last_name" class="block text-gray-800 font-semibold">Last Name</label>
                        <input id="last_name" type="text" 
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-transparent"
                            name="last_name" value="{{ old('last_name', $profile->last_name ?? '') }}" 
                            required autocomplete="family-name">
                        @error('last_name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Date of Birth -->
                    <div class="space-y-2">
                        <label for="date_of_birth" class="block text-gray-800 font-semibold">Date of Birth</label>
                        <input id="date_of_birth" type="date" 
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-transparent"
                            name="date_of_birth" value="{{ old('date_of_birth', $profile->date_of_birth ?? '') }}" 
                            required>
                        @error('date_of_birth')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Sex -->
                    <div x-data="{ selectedSex: '{{ old('sex', $profile->sex ?? '') }}' }" class="space-y-4">
                        <label id="sex-label" class="block text-gray-800 font-semibold mb-3">Sex</label>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
                            <div>
                                <input type="radio" name="sex" id="sex_Male" value="Male" 
                                    x-model="selectedSex"
                                    class="peer sr-only" required>
                                <label for="sex_Male" 
                                    class="flex justify-center items-center font-medium text-sm px-4 py-3 text-center border-2 border-gray-200 rounded-full cursor-pointer transition-all duration-200 
                                    peer-checked:border-gray-800 peer-checked:bg-gray-800 peer-checked:text-white 
                                    hover:border-gray-800"
                                    :class="selectedSex == 'Male' ? 'border-gray-800 bg-gray-800 text-white' : ''">
                                    Male
                                </label>
                            </div>
                            <div>
                                <input type="radio" name="sex" id="sex_Female" value="Female" 
                                    x-model="selectedSex"
                                    class="peer sr-only" required>
                                <label for="sex_Female" 
                                    class="flex justify-center items-center font-medium text-sm px-4 py-3 text-center border-2 border-gray-200 rounded-full cursor-pointer transition-all duration-200 
                                    peer-checked:border-gray-800 peer-checked:bg-gray-800 peer-checked:text-white 
                                    hover:border-gray-800"
                                    :class="selectedSex == 'Female' ? 'border-gray-800 bg-gray-800 text-white' : ''">
                                    Female
                                </label>
                            </div>
                            <div>
                                <input type="radio" name="sex" id="sex_Other" value="Other" 
                                    x-model="selectedSex"
                                    class="peer sr-only" required>
                                <label for="sex_Other" 
                                    class="flex justify-center items-center font-medium text-sm px-4 py-3 text-center border-2 border-gray-200 rounded-full cursor-pointer transition-all duration-200 
                                    peer-checked:border-gray-800 peer-checked:bg-gray-800 peer-checked:text-white 
                                    hover:border-gray-800"
                                    :class="selectedSex == 'Other' ? 'border-gray-800 bg-gray-800 text-white' : ''">
                                    Other
                                </label>
                            </div>
                            <div>
                                <input type="radio" name="sex" id="sex_PreferNotToSay" value="PreferNotToSay" 
                                    x-model="selectedSex"
                                    class="peer sr-only" required>
                                <label for="sex_PreferNotToSay" 
                                    class="flex justify-center items-center font-medium text-sm px-4 py-3 text-center border-2 border-gray-200 rounded-full cursor-pointer transition-all duration-200 
                                    peer-checked:border-gray-800 peer-checked:bg-gray-800 peer-checked:text-white 
                                    hover:border-gray-800"
                                    :class="selectedSex == 'PreferNotToSay' ? 'border-gray-800 bg-gray-800 text-white' : ''">
                                    Prefer Not To Say
                                </label>
                            </div>
                        </div>
                        @error('sex')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Form Actions -->
                    <div class="pt-6 border-t border-gray-100">
                        <div class="flex justify-end">
                            <button type="submit" class="px-6 py-3 bg-gray-800 text-white rounded-full font-medium text-sm hover:bg-gray-700 transition-colors duration-300 flex justify-center items-center">
                                Continue to Physical Information
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
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