<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLevel;
use App\Models\FitnessGoal;
use App\Models\ExperienceLevel;
use App\Models\WorkoutType;
use Illuminate\Http\Request;

class ExperienceLevelController extends Controller
{
    public function index()
    {
        $experienceLevels = ExperienceLevel::all();
        return view('admin.experience_levels_index', compact('experienceLevels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        ExperienceLevel::create($request->all());

        return redirect()->route('admin.experience-levels.index')
            ->with('success', 'Experience level added successfully');
    }

    public function destroy(ExperienceLevel $experienceLevel)
    {
        $experienceLevel->delete();

        return redirect()->route('admin.experience-levels.index')
            ->with('success', 'Experience level deleted successfully');
    }
}
