<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fit-Track | Your Personal Fitness & Nutrition Tracker</title>
  <!-- Tailwind CSS (use the official CDN version) -->
<script src="https://cdn.tailwindcss.com"></script>

<!-- Alpine.js (updated version, optional: still supports v2.8.2 if needed) -->
<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">


    <style>
        /* Set Segoe UI as the primary font */
        body {
            font-family: 'Inter', sans-serif;
        }

        /* We'll keep some animations but remove the scroll animations */
        .animate-fade-in {
            animation: fadeIn 1s ease-in forwards;
        }
        .animate-slide-up {
            animation: slideUp 0.8s ease-out forwards;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes slideUp {
            from { transform: translateY(30px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
    </style>
</head>
<body class="font-sans bg-black text-white" x-data="{ scrolled: false }" x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 50 })">
   <!-- Navigation -->
<nav class="fixed w-full z-50 transition-all duration-300" :class="scrolled ? 'bg-gray-900 shadow-md' : 'bg-transparent'">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <!-- Logo Placeholder -->
                <a href="#" class="flex items-center space-x-2">
                    <img src="{{ asset('images/logo-white.png') }}" alt="Example" class="h-8 w-auto">

                    <!-- Optional: Include text as fallback or branding -->
                    <!-- <span class="text-2xl font-bold text-white hidden sm:inline">FIT-TRACK</span> -->
                </a>
            </div>
            <div class="hidden md:flex items-center space-x-8">
                <a href="#features" class="text-gray-300 hover:text-white transition">Features</a>
                <a href="#benefits" class="text-gray-300 hover:text-white transition">Benefits</a>
                <a href="#about" class="text-gray-300 hover:text-white transition">About</a>
                <a href="#contact" class="text-gray-300 hover:text-white transition">Contact</a>
            </div>
            <div class="flex items-center">
                <a href="#" class="px-4 py-2 text-gray-900 bg-white rounded-3xl font-medium hover:bg-gray-200 transition">Sign Up</a>
            </div>
        </div>
    </div>
</nav>


    <!-- Hero Section -->
    <section class="relative h-screen flex items-center bg-gray-900 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-gray-900 to-black opacity-90"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col items-center text-center z-10">
            <h1 id="hero-title" class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 opacity-0">Transform Your Fitness Journey</h1>
            <p id="hero-subtitle" class="text-xl md:text-2xl max-w-3xl mb-10 opacity-0">The comprehensive web-based solution for personalized workout plans and real-time nutrition tracking.</p>
            <div id="hero-buttons" class="flex flex-col sm:flex-row gap-4 opacity-0">
                <a href="#" class="px-8 py-3 bg-white text-gray-900 font-semibold rounded-3xl hover:bg-gray-200 transition">Get Started</a>
                <a href="#learn-more" class="px-8 py-3 bg-transparent border-2 border-white text-white rounded-3xl hover:bg-white hover:text-gray-900 transition">Learn More</a>
            </div>
        </div>
        <div class="absolute bottom-10 left-0 right-0 flex justify-center animate-bounce">
            <a href="#features" class="text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                </svg>
            </a>
        </div>
    </section>

  <!-- Enhanced Features Section -->
<section id="features" class="py-16 bg-gradient-to-b from-gray-50 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl md:text-4xl font-bold text-center mb-12 text-gray-900">Personalized Health Management</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div class="bg-gray-100 p-8 rounded-xl shadow-sm border border-gray-200 hover:transform hover:scale-105 transition-all duration-300">
                <div class="w-16 h-16 bg-gray-900 text-white rounded-full flex items-center justify-center mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-4 text-gray-900">Customized Workout Plans</h3>
                <p class="text-gray-700 mb-6">Tailored exercise routines based on your fitness level, goals, and preferences.</p>
                <ul class="space-y-3 mb-6">
                    <li class="flex items-start">
                        <svg class="h-5 w-5 text-green-600 mr-2 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="text-gray-700">Bodybuilding, home workouts & calisthenics</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-5 w-5 text-green-600 mr-2 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="text-gray-700">Video guides for perfect form</span>
                    </li>
                </ul>
                <a href="#" class="text-gray-500 font-medium flex items-center hover:text-indigo-800 transition">
                    Explore Plans
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
            <!-- Feature 2 -->
            <div class="bg-gray-100 p-8 rounded-xl shadow-sm border border-gray-200 hover:transform hover:scale-105 transition-all duration-300">
                <div class="w-16 h-16 bg-gray-900 text-white rounded-full flex items-center justify-center mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-4 text-gray-900">Real-Time Nutrition Tracking</h3>
                <p class="text-gray-700 mb-6">Monitor daily nutrition with smart analysis and personalized recommendations.</p>
                <ul class="space-y-3 mb-6">
                    <li class="flex items-start">
                        <svg class="h-5 w-5 text-green-600 mr-2 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="text-gray-700">Macro & micronutrient breakdowns</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-5 w-5 text-green-600 mr-2 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="text-gray-700">Dietary preferences & allergy filters</span>
                    </li>
                </ul>
                <a href="#" class="text-gray-500 font-medium flex items-center hover:text-green-800 transition">
                    Learn More
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
            <!-- Feature 3 -->
            <div class="bg-gray-100 p-8 rounded-xl shadow-sm border border-gray-200 hover:transform hover:scale-105 transition-all duration-300">
                <div class="w-16 h-16 bg-gray-900 text-white rounded-full flex items-center justify-center mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-4 text-gray-900">Progress Tracking</h3>
                <p class="text-gray-700 mb-6">Visualize your journey with comprehensive tracking that keeps you motivated.</p>
                <ul class="space-y-3 mb-6">
                    <li class="flex items-start">
                        <svg class="h-5 w-5 text-green-600 mr-2 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="text-gray-700">Advanced metrics & visual dashboards</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-5 w-5 text-green-600 mr-2 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="text-gray-700">Achievement system & milestone tracking</span>
                    </li>
                </ul>
                <a href="#" class="text-gray-500 font-medium flex items-center hover:text-blue-800 transition">
                    See Progress Tools
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>

    <!-- How It Works Section -->
    <section id="learn-more" class="py-16 bg-gradient-to-br from-gray-900 to-black opacity-90">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center mb-12 text-white">How Fit-Track Works</h2>
            <div class="flex flex-col md:flex-row items-center justify-between gap-8">
                <div class="md:w-1/2">
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="flex items-center justify-center h-12 w-12 rounded-md bg-gray-800 text-white">1</div>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-white">Create Your Profile</h3>
                                <p class="mt-1 text-gray-400">Enter your personal details, fitness goals, and preferences to receive a tailored experience.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="flex items-center justify-center h-12 w-12 rounded-md bg-gray-800 text-white">2</div>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-white">Select Your Workout Style</h3>
                                <p class="mt-1 text-gray-400">Choose from bodybuilding, home workouts, or calisthenics plans tailored to your fitness level.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="flex items-center justify-center h-12 w-12 rounded-md bg-gray-800 text-white">3</div>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-white">Track Your Nutrition</h3>
                                <p class="mt-1 text-gray-400">Log meals, monitor macronutrients, and receive recommendations based on your body type and goals.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="flex items-center justify-center h-12 w-12 rounded-md bg-gray-800 text-white">4</div>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-white">Monitor Your Progress</h3>
                                <p class="mt-1 text-gray-400">View weekly reports and track your journey toward achieving your fitness goals.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="md:w-1/2 mt-8 md:mt-0">
                    <div class="bg-gray-800 p-4 rounded-lg shadow-lg border border-gray-700">
                        <img src="/api/placeholder/600/400" alt="Fit-Track Dashboard Preview" class="rounded-md"/>
                    </div>
                </div>
            </div>
        </div>
    </section>

  <!-- Enhanced Benefits Section -->
<section id="benefits" class="py-16 bg-white text-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl md:text-4xl font-bold text-center mb-12">Why Choose Fit-Track?</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <!-- For Beginners -->
            <div class="bg-gray-100 p-8 rounded-2xl  shadow-sm border border-gray-200 relative overflow-hidden group">
                
                <h3 class="text-2xl font-bold mb-6 flex items-center">
                    <span class="bg-gray-800 text-white p-2 rounded-lg mr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                    </span>
                    For Beginners
                </h3>
                <ul class="space-y-5 relative z-10">
                    <li class="flex items-start bg-gray-200 p-4 rounded-lg transform hover:-translate-y-1 transition-all duration-300">
                        <svg class="h-6 w-6 text-indigo-600 mr-3 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <div>
                            <span class="font-medium text-gray-900 block mb-1">Guided Step-by-Step Workouts</span>
                            <span class="text-gray-700 text-sm">Follow along with beginner-friendly routines designed to build proper form and confidence</span>
                        </div>
                    </li>
                    <li class="flex items-start bg-gray-200 p-4 rounded-lg transform hover:-translate-y-1 transition-all duration-300">
                        <svg class="h-6 w-6 text-indigo-600 mr-3 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <div>
                            <span class="font-medium text-gray-900 block mb-1">Nutrition Fundamentals</span>
                            <span class="text-gray-700 text-sm">Learn the essentials of proper nutrition with clear explanations and simple meal plans</span>
                        </div>
                    </li>
                    <li class="flex items-start bg-gray-200 p-4 rounded-lg transform hover:-translate-y-1 transition-all duration-300">
                        <svg class="h-6 w-6 text-indigo-600 mr-3 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <div>
                            <span class="font-medium text-gray-900 block mb-1">Progress Celebration</span>
                            <span class="text-gray-700 text-sm">Small wins are big victories - our system recognizes and celebrates every achievement</span>
                        </div>
                    </li>
                </ul>
            </div>
            
            <!-- For Advanced Users -->
            <div class="bg-gray-100 p-8 rounded-2xl shadow-sm border border-gray-200 relative overflow-hidden group">
            
                <h3 class="text-2xl font-bold mb-6 flex items-center">
                    <span class="bg-gray-800 text-white p-2 rounded-lg mr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </span>
                    For Advanced Users
                </h3>
                <ul class="space-y-5 relative z-10">
                    <li class="flex items-start bg-gray-200 p-4 rounded-lg transform hover:-translate-y-1 transition-all duration-300">
                        <svg class="h-6 w-6 text-green-600 mr-3 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <div>
                            <span class="font-medium text-gray-900 block mb-1">Periodized Training Programs</span>
                            <span class="text-gray-700 text-sm">Scientifically designed workout cycles with progressive overload for optimal strength and muscle gains</span>
                        </div>
                    </li>
                    <li class="flex items-start bg-gray-200 p-4 rounded-lg transform hover:-translate-y-1 transition-all duration-300">
                        <svg class="h-6 w-6 text-green-600 mr-3 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <div>
                            <span class="font-medium text-gray-900 block mb-1">Advanced Nutrition Analytics</span>
                            <span class="text-gray-700 text-sm">Detailed macro timing, nutrient cycling, and periodization to maximize performance and recovery</span>
                        </div>
                    </li>
                    <li class="flex items-start bg-gray-200 p-4 rounded-lg transform hover:-translate-y-1 transition-all duration-300">
                        <svg class="h-6 w-6 text-green-600 mr-3 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <div>
                            <span class="font-medium text-gray-900 block mb-1">Performance Insights</span>
                            <span class="text-gray-700 text-sm">Deep data analysis to identify patterns, strengths, weaknesses and optimization opportunities</span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

    <!-- Enhanced CTA Section -->
<section class="py-20 bg-gray-50 text-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row items-center justify-between">
            <div class="md:w-1/2 mb-10 md:mb-0">
                <h2 class="text-3xl md:text-4xl font-bold mb-6">Ready to Transform Your Fitness Journey?</h2>
                <p class="text-xl mb-8 text-gray-800">Join thousands of users who've achieved their health and fitness goals with Fit-Track's personalized approach.</p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="#" class="px-8 py-4 bg-gray-900 text-white font-bold rounded-3xl hover:bg-gray-800 transition-all duration-300 text-center shadow-lg">
                        Start Free Trial
                    </a>
                    <a href="#" class="px-8 py-4 bg-gray-200  text-gray-600 font-bold rounded-3xl hover:text-gray-500 transition-all duration-300 text-center">
                        View Plans
                    </a>
                </div>
                
                <div class="mt-8 flex items-center">
                    <div class="flex -space-x-2">
                        <img src="{{ asset('images/profile1.jpg') }}" alt="User" class="w-10 h-10 rounded-full border-2 border-white"/>
                        <img  src="{{ asset('images/profile2.jpg') }}" class="w-10 h-10 rounded-full border-2 border-white"/>
                        <img  src="{{ asset('images/profile3.jpg') }}" class="w-10 h-10 rounded-full border-2 border-white"/>
                    </div>
                    <p class="ml-4 text-gray-700">
                        <span class="font-bold ">Trusted by 10,000+</span> fitness enthusiasts
                    </p>
                </div>
            </div>
            
            <div class="md:w-5/12">
                <div class="bg-white p-8 rounded-xl shadow-md">
                    <h3 class="text-2xl font-bold mb-6 text-gray-900">Get Started Today</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Full Name</label>
                            <input type="text" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Email Address</label>
                            <input type="email" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Fitness Goal</label>
                            <select class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition">
                                <option>Build Muscle</option>
                                <option>Lose Weight</option>
                                <option>Improve Fitness</option>
                                <option>Other</option>
                            </select>
                        </div>
                        <button class="w-full bg-gray-900 text-white py-4 px-8 rounded-lg font-bold hover:opacity-90 transition shadow-lg">
                            Create Free Account
                        </button>
                    </div>
                    <p class="text-gray-500 text-center text-sm mt-4">No credit card required. 14-day free trial.</p>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- Footer -->
    <footer class="bg-gradient-to-br from-gray-900 to-black opacity-90 text-white pt-12 pb-8 border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <img src="{{ asset('images/logo-white.png') }}" alt="Example" class="h-8 w-auto">
                    <p class="text-gray-400">Your personal fitness and nutrition tracker designed to help you achieve your health goals.</p>
                </div>
                <div>
                    <h4 class="font-semibold mb-4 text-white">Features</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white transition">Workout Plans</a></li>
                        <li><a href="#" class="hover:text-white transition">Nutrition Tracking</a></li>
                        <li><a href="#" class="hover:text-white transition">Progress Monitoring</a></li>
                        <li><a href="#" class="hover:text-white transition">Health Insights</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold mb-4 text-white">Resources</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white transition">Help Center</a></li>
                        <li><a href="#" class="hover:text-white transition">Blog</a></li>
                        <li><a href="#" class="hover:text-white transition">Tutorials</a></li>
                        <li><a href="#" class="hover:text-white transition">FAQs</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold mb-4 text-white">Contact</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white transition">Email Us</a></li>
                        <li><a href="#" class="hover:text-white transition">Support</a></li>
                        <li><a href="#" class="hover:text-white transition">Feedback</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-500">© 2025 Fit-Track. All rights reserved.</p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="#" class="text-gray-500 hover:text-white transition">Privacy Policy</a>
                    <a href="#" class="text-gray-500 hover:text-white transition">Terms of Service</a>
                    <a href="#" class="text-gray-500 hover:text-white transition">Cookie Policy</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Hero Section Animation on Page Load
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(() => {
                document.getElementById('hero-title').classList.add('animate-fade-in');
            }, 300);
            
            setTimeout(() => {
                document.getElementById('hero-subtitle').classList.add('animate-slide-up');
            }, 800);
            
            setTimeout(() => {
                document.getElementById('hero-buttons').classList.add('animate-fade-in');
            }, 1300);
        });

        // Removed scroll animation code to eliminate scrollable animations
    </script>
</body>
</html>