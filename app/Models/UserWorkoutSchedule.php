<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use App\Models\WorkoutTemplate;

class UserWorkoutSchedule extends Model
{
    use HasFactory;

    protected $table = 'user_workout_schedules';

    protected $fillable = [
        'user_id',
        'template_id',
        'assigned_date',
        'status',
        'completion_date',
        'user_notes',
    ];

    protected $casts = [
        'assigned_date' => 'date', 
        'completion_date' => 'datetime',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function workoutTemplate()
    {
        return $this->belongsTo(WorkoutTemplate::class, 'template_id');
    }

    // Helper methods
    public function markCompleted()
    {
        $this->status = 'Completed';
        $this->completion_date = now();
        $this->save();
        
        return $this;
    }

    public function markSkipped()
    {
        $this->status = 'Skipped';
        $this->save();
        
        return $this;
    }

    public function scopeThisWeek($query)
    {
        return $query->whereBetween('assigned_date', [
            now()->startOfWeek(),
            now()->endOfWeek()
        ]);
    }
    
    public function scopeCompleted($query)
    {
        return $query->where('status', 'Completed');
    }
}
