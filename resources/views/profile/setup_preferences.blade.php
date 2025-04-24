<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">{{ __('Profile Setup - Lifestyle & Preferences') }}</h5>
                            <span class="badge bg-primary">Step 3 of 3</span>
                        </div>
                    </div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.setup.preferences.store') }}">
                            @csrf
    
                            <div class="form-group row mb-3">
                                <label for="activity_level_id" class="col-md-4 col-form-label text-md-right">{{ __('Activity Level') }}</label>
                                <div class="col-md-6">
                                    <select id="activity_level_id" class="form-select @error('activity_level_id') is-invalid @enderror" name="activity_level_id" required>
                                        <option value="">Select your activity level</option>
                                        @foreach($activityLevels as $level)
                                            <option value="{{ $level->id }}" {{ (old('activity_level_id', $profile->activity_level_id ?? '') == $level->id) ? 'selected' : '' }}>
                                                {{ $level->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('activity_level_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row mb-3">
                                <label for="fitness_goal_id" class="col-md-4 col-form-label text-md-right">{{ __('Primary Fitness Goal') }}</label>
                                <div class="col-md-6">
                                    <select id="fitness_goal_id" class="form-select @error('fitness_goal_id') is-invalid @enderror" name="fitness_goal_id" required>
                                        <option value="">Select your primary goal</option>
                                        @foreach($fitnessGoals as $goal)
                                            <option value="{{ $goal->id }}" {{ (old('fitness_goal_id', $profile->fitness_goal_id ?? '') == $goal->id) ? 'selected' : '' }}>
                                                {{ $goal->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('fitness_goal_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row mb-3">
                                <label for="experience_level_id" class="col-md-4 col-form-label text-md-right">{{ __('Experience Level') }}</label>
                                <div class="col-md-6">
                                    <select id="experience_level_id" class="form-select @error('experience_level_id') is-invalid @enderror" name="experience_level_id" required>
                                        <option value="">Select your experience level</option>
                                        @foreach($experienceLevels as $level)
                                            <option value="{{ $level->id }}" {{ (old('experience_level_id', $profile->experience_level_id ?? '') == $level->id) ? 'selected' : '' }}>
                                                {{ $level->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('experience_level_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row mb-3">
                                <label for="workout_type_id" class="col-md-4 col-form-label text-md-right">{{ __('Preferred Workout Type') }}</label>
                                <div class="col-md-6">
                                    <select id="workout_type_id" class="form-select @error('workout_type_id') is-invalid @enderror" name="workout_type_id" required>
                                        <option value="">Select your preferred workout</option>
                                        @foreach($workoutTypes as $type)
                                            <option value="{{ $type->id }}" {{ (old('workout_type_id', $profile->workout_type_id ?? '') == $type->id) ? 'selected' : '' }}>
                                                {{ $type->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('workout_type_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row mb-3">
                                <label class="col-md-4 col-form-label text-md-right">{{ __('Known Allergies') }}</label>
                                <div class="col-md-6">
                                    <div class="border rounded p-3" style="max-height: 200px; overflow-y: auto;">
                                        @foreach($allergies as $allergy)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="allergies[]" id="allergy_{{ $allergy->id }}" value="{{ $allergy->id }}" 
                                                    {{ in_array($allergy->id, old('allergies', $userAllergies) ?: []) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="allergy_{{ $allergy->id }}">
                                                    {{ $allergy->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                    @error('allergies')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4 d-flex justify-content-between">
                                    <a href="{{ route('profile.setup.physical') }}" class="btn btn-outline-secondary">
                                        {{ __('Back') }}
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Complete Profile Setup') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>