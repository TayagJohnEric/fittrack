<!-- Sidebar (hidden on mobile) -->
<div id="sidebar" class="hidden md:flex fixed md:static flex-col w-64 h-full bg-gray-100 text-gray-700 shadow-sm transition-all duration-300 z-50">
    <!-- Sidebar Header -->
    <div class="flex items-center justify-center h-16 px-4 relative">
        <img src="{{ asset('images/logo-black.png') }}" alt="Example" class="h-8 w-auto">
        <!-- Close button (mobile only) -->
        <button id="sidebar-close" class="md:hidden text-white hover:text-gray-300 focus:outline-none absolute right-4">
            <i data-lucide="x" class="text-green-500 w-6 h-6"></i>
        </button>
    </div>

    <!-- Sidebar Navigation -->
    <nav class="flex-1 overflow-y-auto py-4">
        <ul class="space-y-2 px-4">
            <!-- Sidebar Menu Items -->
            <li>
                <a href="#" class="group flex items-center font-semibold p-2 rounded-lg text-gray-600 no-underline hover:bg-gray-800 hover:text-white transition-colors">
                    <!-- Home -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="w-6 h-6 text-gray-400 group-hover:text-white lucide lucide-house">
                        <path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8"/>
                        <path d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                    </svg>
                    <span class="ml-2">Home</span>
                </a>
            </li>
            <li>
                <a href="#" class="group flex items-center font-semibold p-2 rounded-lg text-gray-600 no-underline hover:bg-gray-800 hover:text-white transition-colors">
                    <!-- Nutrition -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="w-6 h-6 text-gray-400 group-hover:text-white lucide lucide-apple">
                        <path d="M12 20.94c1.5 0 2.75 1.06 4 1.06 3 0 6-8 6-12.22A4.91 4.91 0 0 0 17 5c-2.22 0-4 1.44-5 2-1-.56-2.78-2-5-2a4.9 4.9 0 0 0-5 4.78C2 14 5 22 8 22c1.25 0 2.5-1.06 4-1.06Z"/>
                        <path d="M10 2c1 .5 2 2 2 5"/>
                    </svg>
                    <span class="ml-2">Nutrition</span>
                </a>
            </li>
            <li>
                <a href="#" class="group flex items-center font-semibold p-2 rounded-lg text-gray-600 no-underline hover:bg-gray-800 hover:text-white transition-colors">
                    <!-- Workouts -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="w-6 h-6 text-gray-400 group-hover:text-white lucide lucide-dumbbell">
                        <path d="M14.4 14.4 9.6 9.6"/>
                        <path d="M18.657 21.485a2 2 0 1 1-2.829-2.828l-1.767 1.768a2 2 0 1 1-2.829-2.829l6.364-6.364a2 2 0 1 1 2.829 2.829l-1.768 1.767a2 2 0 1 1 2.828 2.829z"/>
                        <path d="m21.5 21.5-1.4-1.4"/>
                        <path d="M3.9 3.9 2.5 2.5"/>
                        <path d="M6.404 12.768a2 2 0 1 1-2.829-2.829l1.768-1.767a2 2 0 1 1-2.828-2.829l2.828-2.828a2 2 0 1 1 2.829 2.828l1.767-1.768a2 2 0 1 1 2.829 2.829z"/>
                    </svg>
                    <span class="ml-2">Workouts</span>
                </a>
            </li>
            <li>
                <a href="#" class="group flex items-center font-semibold p-2 rounded-lg text-gray-600 no-underline hover:bg-gray-800 hover:text-white transition-colors">
                    <!-- Progress -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="w-6 h-6 text-gray-400 group-hover:text-white lucide lucide-chart-line">
                        <path d="M3 3v16a2 2 0 0 0 2 2h16"/>
                        <path d="m19 9-5 5-4-4-3 3"/>
                    </svg>
                    <span class="ml-2">Progress</span>
                </a>
            </li>
            <li>
                <a href="#" class="group flex items-center font-semibold p-2 rounded-lg text-gray-600 no-underline hover:bg-gray-800 hover:text-white transition-colors">
                    <!-- Profile -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="w-6 h-6 text-gray-400 group-hover:text-white lucide lucide-user-pen">
                        <path d="M11.5 15H7a4 4 0 0 0-4 4v2"/>
                        <path d="M21.378 16.626a1 1 0 0 0-3.004-3.004l-4.01 4.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z"/>
                        <circle cx="10" cy="7" r="4"/>
                    </svg>
                    <span class="ml-2">Profile</span>
                </a>
            </li>
            
        </ul>
    </nav>
</div>
