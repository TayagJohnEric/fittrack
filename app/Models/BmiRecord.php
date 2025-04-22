<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;

class BmiRecord extends Model
{
    use HasFactory;

    protected $table = 'bmi_records';

    protected $fillable = [
        'user_id',
        'log_date',
        'bmi_value',
        'interpretation',
    ];

    protected $casts = [
        'log_date' => 'date',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Helper methods
    public function scopeLastMonth($query)
    {
        return $query->where('log_date', '>=', now()->subMonth());
    }
}
