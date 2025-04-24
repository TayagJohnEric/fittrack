<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLevel;
use App\Models\FitnessGoal;
use App\Models\ExperienceLevel;
use App\Models\WorkoutType;
use App\Models\Allergy;
use Illuminate\Http\Request;

class AllergyController extends Controller
{
    public function index()
    {
        $allergies = Allergy::all();
        return view('admin.allergies_index', compact('allergies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Allergy::create($request->all());

        return redirect()->route('admin.allergies.index')
            ->with('success', 'Allergy added successfully');
    }

    public function destroy(Allergy $allergy)
    {
        $allergy->delete();

        return redirect()->route('admin.allergies.index')
            ->with('success', 'Allergy deleted successfully');
    }
}
