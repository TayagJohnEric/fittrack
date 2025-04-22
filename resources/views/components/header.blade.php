<!-- Header -->
<header class="bg-white">
    <div class="flex items-center justify-between px-4 py-3">
        <!-- Left Section -->
        <div class="flex items-center space-x-4">
            <!-- Hamburger Menu (mobile only) -->
            <button id="sidebar-toggle" class="text-gray-500 hover:text-gray-700 focus:outline-none md:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                 stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu-icon lucide-menu">
                 <line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/>
                </svg>
            </button>
            
            <!-- Search Component -->
            @include('components.search')
        </div>

        <!-- Right Section -->
        <div class="flex items-center space-x-4">
          
            <!-- Profile Component -->
            @include('components.profile')
        </div>
    </div>
</header>
