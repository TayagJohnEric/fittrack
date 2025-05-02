<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FitTrack - Onboarding Complete</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }   

        </style>

</head>
<body class="bg-white min-h-screen">
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-4xl mx-auto">
            <!-- Success Card -->
            <div class="bg-white rounded-xl  overflow-hidden">
                <!-- Header -->
                <div class="bg-white px-6 py-4 flex items-center justify-between">
                    <h1 class="text-xl md:text-2xl font-bold text-gray-800 flex items-center">
                        <i class="fas fa-check-circle mr-3 text-green-600"></i>
                        Onboarding Complete!
                    </h1>
                    <div class="bg-white rounded-full p-2">
                        <i class="fas fa-dumbbell text-gray-500 text-xl"></i>
                    </div>
                </div>
                
                <!-- Welcome Message -->
                <div class="p-6">
                    <div class="bg-emerald-50 border-l-4 border-emerald-500 p-4 rounded-r mb-8">
                        <h2 class="text-lg md:text-xl font-semibold text-emerald-800">Welcome to FitTrack, {{ $profile->first_name }}!</h2>
                        <p class="text-emerald-700 mt-1">Your personal fitness journey starts now. We've set up everything for you based on your profile information.</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- BMI Information -->
                        <div class="bg-gray-50 rounded-lg border border-gray-200 shadow-sm h-full">
                            <div class="text-gray-800 px-4 py-3 rounded-t-lg">
                                <h3 class="font-semibold text-lg flex items-center">
                                    <i class="fas fa-weight mr-2 text-gray-700"></i>
                                    Your BMI
                                </h3>
                            </div>
                            <div class="p-5">
                                @if($bmiRecord)
                                    <div class="flex justify-between items-center">
                                        <h2 class="text-3xl font-bold text-gray-800">{{ $bmiRecord->bmi_value }}</h2>
                                        @php
                                            $badgeColor = 'bg-green-100 text-green-800';
                                            if ($bmiRecord->interpretation == 'Underweight') {
                                                $badgeColor = 'bg-yellow-100 text-yellow-800';
                                            } elseif ($bmiRecord->interpretation == 'Overweight') {
                                                $badgeColor = 'bg-yellow-100 text-yellow-800';
                                            } elseif ($bmiRecord->interpretation == 'Obese') {
                                                $badgeColor = 'bg-red-100 text-red-800';
                                            }
                                        @endphp
                                        <span class="px-3 py-1 rounded-full text-sm font-medium {{ $badgeColor }}">
                                            {{ $bmiRecord->interpretation }}
                                        </span>
                                    </div>
                                    <p class="text-gray-500 text-sm mt-1">Height: {{ $profile->height_cm }} cm, Weight: {{ $profile->current_weight_kg }} kg</p>
                                    
                                    <div class="mt-4 relative">
                                        <div class="h-2 w-full bg-gray-200 rounded-full overflow-hidden">
                                            @php
                                                $bmiPercentage = min(100, max(0, ($bmiRecord->bmi_value - 15) * 100 / 25));
                                                $progressClass = 'bg-green-500';
                                                
                                                if ($bmiRecord->bmi_value < 18.5) {
                                                    $progressClass = 'bg-yellow-500';
                                                } elseif ($bmiRecord->bmi_value >= 25 && $bmiRecord->bmi_value < 30) {
                                                    $progressClass = 'bg-yellow-500';
                                                } elseif ($bmiRecord->bmi_value >= 30) {
                                                    $progressClass = 'bg-red-500';
                                                }
                                                
                                                // Position the indicator
                                                $indicatorPosition = $bmiPercentage;
                                            @endphp
                                            <div class="absolute top-0 left-0 w-full h-2">
                                                <div class="absolute top-0 left-0 h-full {{ $progressClass }}" style="width: {{ $bmiPercentage }}%"></div>
                                                <div class="absolute -top-1 h-4 w-1 bg-gray-800 transform -translate-x-1/2" style="left: {{ $indicatorPosition }}%"></div>
                                            </div>
                                        </div>
                                        <div class="flex justify-between mt-2 text-xs text-gray-600">
                                            <span>Underweight</span>
                                            <span>Normal</span>
                                            <span>Overweight</span>
                                            <span>Obese</span>
                                        </div>
                                    </div>
                                @else
                                    <div class="flex items-center justify-center h-32 text-gray-500">
                                        <div class="text-center">
                                            <i class="fas fa-exclamation-circle text-xl mb-2"></i>
                                            <p>BMI data is incomplete. Please ensure your height and weight are entered.</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Nutrition Goals -->
                        <div class="bg-gray-50 rounded-lg border border-gray-200 shadow-sm h-full">
                            <div class="bg-gray-50 text-gray-800 px-4 py-3 rounded-t-lg">
                                <h3 class="font-semibold text-lg flex items-center">
                                    <i class="fas fa-utensils mr-2 text-gray-700"></i>
                                    Your Nutrition Goals
                                </h3>
                            </div>
                            <div class="p-5">
                                @if($nutritionGoals)
                                    <div class="flex flex-col md:flex-row items-center">
                                        <div class="w-full md:w-1/2 text-center md:text-left mb-4 md:mb-0">
                                            <h3 class="text-3xl font-bold text-gray-800">{{ $nutritionGoals->target_calories }}</h3>
                                            <p class="text-gray-500">Daily Calorie Target</p>
                                        </div>
                                        <div class="w-full md:w-1/2 h-32">
                                            <canvas id="macroChart" aria-label="Macronutrient distribution chart" role="img"></canvas>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-3 gap-2 mt-6 text-center">
                                        <div class="bg-pink-50 rounded-lg p-3">
                                            <h5 class="text-lg font-semibold text-pink-600">{{ $nutritionGoals->target_protein_grams }}g</h5>
                                            <p class="text-xs text-gray-600">Protein</p>
                                        </div>
                                        <div class="bg-blue-50 rounded-lg p-3">
                                            <h5 class="text-lg font-semibold text-blue-600">{{ $nutritionGoals->target_carb_grams }}g</h5>
                                            <p class="text-xs text-gray-600">Carbs</p>
                                        </div>
                                        <div class="bg-yellow-50 rounded-lg p-3">
                                            <h5 class="text-lg font-semibold text-yellow-600">{{ $nutritionGoals->target_fat_grams }}g</h5>
                                            <p class="text-xs text-gray-600">Fat</p>
                                        </div>
                                    </div>
                                @else
                                    <div class="flex items-center justify-center h-32 text-gray-500">
                                        <div class="text-center">
                                            <i class="fas fa-exclamation-circle text-xl mb-2"></i>
                                            <p>Nutrition goals could not be calculated. Please complete your profile.</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Workout Schedule -->
                    <div class="bg-gray-50 rounded-lg border border-gray-200 shadow-sm mt-6">
                        <div class="bg-gray-50 text-gray-800 px-4 py-3 rounded-t-lg">
                            <h3 class="font-semibold text-lg flex items-center">
                                <i class="fas fa-calendar-alt mr-2 text-gray-700"></i>
                                Your Workout Schedule
                            </h3>
                        </div>
                        <div class="p-5">
                            @if(count($workoutSchedules) > 0)
                                <div class="overflow-x-auto">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead>
                                            <tr>
                                                <th class="px-3 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                                <th class="px-3 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Workout</th>
                                                <th class="px-3 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                                                <th class="px-3 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Duration</th>
                                                <th class="px-3 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach($workoutSchedules as $schedule)
                                                <tr class="hover:bg-gray-50">
                                                    <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-900">{{ $schedule->assigned_date->format('D, M d') }}</td>
                                                    <td class="px-3 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $schedule->workoutTemplate->title }}</td>
                                                    <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-500">{{ $schedule->workoutTemplate->workoutType->name ?? 'General' }}</td>
                                                    <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-500">{{ $schedule->workoutTemplate->estimated_duration_minutes }} min</td>
                                                    <td class="px-3 py-4 whitespace-nowrap text-sm">
                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                                            {{ $schedule->status }}
                                                        </span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="flex items-center justify-center py-10 text-gray-500 text-center">
                                    <div>
                                        <i class="fas fa-calendar-plus text-2xl mb-3"></i>
                                        <p>No workout schedule has been created yet.</p>
                                        <p class="text-sm mt-1">Visit your dashboard to set up your first workout!</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- CTA Button -->
                    <div class="flex justify-center mt-8">
                        <a href="{{ route('dashboard') }}" class="px-3 py-2 bg-gray-800 hover:bg-gray-700 text-white font-medium text-sm rounded-lg shadow-md transition duration-200 focus:outline-none focus:ring-2 focus:ring-gray-800 focus:ring-opacity-50 flex items-center">
                            <span>Continue to Dashboard</span>
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Additional Resources -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-6">
                <a href="#" class="bg-white p-4 rounded-lg shadow-sm border border-gray-200 hover:shadow-md transition duration-200 flex items-center">
                    <div class="bg-gray-100 p-3 rounded-full mr-3">
                        <i class="fas fa-book text-gray-500"></i>
                    </div>
                    <div>
                        <h4 class="font-medium text-gray-800">Beginner's Guide</h4>
                        <p class="text-xs text-gray-500">Learn how to use FitTrack</p>
                    </div>
                </a>
                <a href="#" class="bg-white p-4 rounded-lg shadow-sm border border-gray-200 hover:shadow-md transition duration-200 flex items-center">
                    <div class="bg-gray-100 p-3 rounded-full mr-3">
                        <i class="fas fa-apple-alt text-gray-500"></i>
                    </div>
                    <div>
                        <h4 class="font-medium text-gray-800">Nutrition Tips</h4>
                        <p class="text-xs text-gray-500">Healthy meal ideas</p>
                    </div>
                </a>
                <a href="#" class="bg-white p-4 rounded-lg shadow-sm border border-gray-200 hover:shadow-md transition duration-200 flex items-center">
                    <div class="bg-gray-100 p-3 rounded-full mr-3">
                        <i class="fas fa-heart-pulse text-gray-500"></i>
                    </div>
                    <div>
                        <h4 class="font-medium text-gray-800">Community</h4>
                        <p class="text-xs text-gray-500">Connect with others</p>
                    </div>
                </a>
            </div>
        </div>
    </div>

    @if($nutritionGoals)
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('macroChart').getContext('2d');
            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Protein', 'Carbs', 'Fat'],
                    datasets: [{
                        data: [
                            {{ $nutritionGoals->target_protein_grams * 4 }}, 
                            {{ $nutritionGoals->target_carb_grams * 4 }}, 
                            {{ $nutritionGoals->target_fat_grams * 9 }}
                        ],
                        backgroundColor: [
                            '#FF6384',
                            '#36A2EB',
                            '#FFCE56'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    const labels = ['Protein', 'Carbs', 'Fat'];
                                    const values = [
                                        {{ $nutritionGoals->target_protein_grams }},
                                        {{ $nutritionGoals->target_carb_grams }},
                                        {{ $nutritionGoals->target_fat_grams }}
                                    ];
                                    const calories = [
                                        {{ $nutritionGoals->target_protein_grams * 4 }},
                                        {{ $nutritionGoals->target_carb_grams * 4 }},
                                        {{ $nutritionGoals->target_fat_grams * 9 }}
                                    ];
                                    const index = context.dataIndex;
                                    return `${labels[index]}: ${values[index]}g (${calories[index]} kcal)`;
                                }
                            }
                        }
                    },
                    cutout: '70%'
                }
            });
        });
    </script>
    @endif
</body>
</html>