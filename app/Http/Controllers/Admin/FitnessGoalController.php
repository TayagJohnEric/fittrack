<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLevel;
use App\Models\FitnessGoal;
use App\Models\ExperienceLevel;
use App\Models\WorkoutType;
use Illuminate\Http\Request;

class FitnessGoalController extends Controller
{
    public function index()
    {
        $fitnessGoals = FitnessGoal::all();
        return view('admin.fitness_goals_index', compact('fitnessGoals'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        FitnessGoal::create($request->all());

        return redirect()->route('admin.fitness-goals.index')
            ->with('success', 'Fitness goal added successfully');
    }

    public function destroy(FitnessGoal $fitnessGoal)
    {
        $fitnessGoal->delete();

        return redirect()->route('admin.fitness-goals.index')
            ->with('success', 'Fitness goal deleted successfully');
    }
}
