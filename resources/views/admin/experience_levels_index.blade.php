
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="mb-6 border-b border-gray-200 pb-4">
                <h2 class="text-2xl font-semibold text-gray-800">Experience Levels</h2>
            </div>
    
            @if(session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    {{ session('success') }}
                </div>
            @endif
    
            <!-- Form to add new experience level -->
            <div class="mb-10">
                <div class="bg-gray-50 rounded-lg shadow p-6 max-w-xl">
                    <h3 class="text-xl font-semibold mb-4 text-gray-700">Add New Experience Level</h3>
                    <form action="{{ route('admin.experience-levels.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Level Name</label>
                            <input type="text" id="name" name="name" required
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div>
                            <button type="submit"
                                    class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 transition">
                                Add Experience Level
                            </button>
                        </div>
                    </form>
                </div>
            </div>
    
            <!-- List of existing experience levels -->
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 border text-sm text-left">
                    <thead class="bg-gray-100 text-gray-600 uppercase text-xs tracking-wider">
                        <tr>
                            <th class="px-4 py-2">ID</th>
                            <th class="px-4 py-2">Level Name</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($experienceLevels as $level)
                            <tr>
                                <td class="px-4 py-2">{{ $level->id }}</td>
                                <td class="px-4 py-2">{{ $level->name }}</td>
                                <td class="px-4 py-2">
                                    <form action="{{ route('admin.experience-levels.destroy', $level) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this experience level?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="inline-flex items-center px-3 py-1 bg-red-600 text-white text-xs font-medium rounded hover:bg-red-700 transition">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-4 py-4 text-center text-gray-500">No experience levels found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="flex flex-col space-y-2 w-64">
        <a href="{{ route('admin.activity-levels.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Activity Levels</a>
        <a href="{{ route('admin.fitness-goals.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Fitness Goals</a>
        <a href="{{ route('admin.experience-levels.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Experience Levels</a>
        <a href="{{ route('admin.workout-types.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Workout Types</a>
        <a href="{{ route('admin.allergies.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Allergies</a>
    </div>
    

</body>
</html>


