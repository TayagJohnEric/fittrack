<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use App\Models\Allergy;

class UserAllergy extends Model
{
    use HasFactory;

    protected $table = 'user_allergies';

    protected $fillable = [
        'user_id',
        'allergy_id',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function allergy()
    {
        return $this->belongsTo(Allergy::class);
    }
}
