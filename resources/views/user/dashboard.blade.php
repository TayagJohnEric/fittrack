@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="bg-white rounded-lg shadow p-6 mb-6">
                    <h2 class="text-xl font-bold mb-4">Main Content Area</h2>
                    <p class="text-gray-600">
                        This is the main content section of your layout. You can add your specific content here.
                    </p>
                </div>
                
                <!-- Example content cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="font-bold mb-2">Card Title 1</h3>
                        <p class="text-gray-600">Content placeholder for card 1</p>
                    </div>
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="font-bold mb-2">Card Title 2</h3>
                        <p class="text-gray-600">Content placeholder for card 2</p>
                    </div>
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="font-bold mb-2">Card Title 3</h3>
                        <p class="text-gray-600">Content placeholder for card 3</p>
                    </div>
                </div>

@endsection