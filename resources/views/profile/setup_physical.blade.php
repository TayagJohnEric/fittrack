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
                            <h5 class="mb-0">{{ __('Profile Setup - Physical Information') }}</h5>
                            <span class="badge bg-primary">Step 2 of 3</span>
                        </div>
                    </div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.setup.physical') }}">
                            @csrf
    
                            <div class="form-group row mb-3">
                                <label for="height_cm" class="col-md-4 col-form-label text-md-right">{{ __('Height (cm)') }}</label>
                                <div class="col-md-6">
                                    <input id="height_cm" type="number" class="form-control @error('height_cm') is-invalid @enderror" name="height_cm" value="{{ old('height_cm', $profile->height_cm ?? '') }}" required min="1" step="1">
                                    @error('height_cm')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row mb-3">
                                <label for="current_weight_kg" class="col-md-4 col-form-label text-md-right">{{ __('Current Weight (kg)') }}</label>
                                <div class="col-md-6">
                                    <input id="current_weight_kg" type="number" class="form-control @error('current_weight_kg') is-invalid @enderror" name="current_weight_kg" value="{{ old('current_weight_kg', $profile->current_weight_kg ?? '') }}" required min="1" step="0.1">
                                    @error('current_weight_kg')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4 d-flex justify-content-between">
                                    <a href="{{ route('profile.setup.basics') }}" class="btn btn-outline-secondary">
                                        {{ __('Back') }}
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Continue to Preferences') }}
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