<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLevel;
use App\Models\FitnessGoal;
use App\Models\ExperienceLevel;
use App\Models\WorkoutType;
use App\Models\Allergy;
use Illuminate\Http\Request;

class WorkoutTypeController extends Controller
{
    public function index()
    {
        $workoutTypes = WorkoutType::all();
        return view('admin.workout_types_index', compact('workoutTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        WorkoutType::create($request->all());

        return redirect()->route('admin.workout-types.index')
            ->with('success', 'Workout type added successfully');
    }

    public function destroy(WorkoutType $workoutType)
    {
        $workoutType->delete();

        return redirect()->route('admin.workout-types.index')
            ->with('success', 'Workout type deleted successfully');
    }
}
