<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;    

class Allergy extends Model
{
    use HasFactory;

    protected $table = 'allergies';

    protected $fillable = [
        'name',
    ];

    // Relationships
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_allergies');
    }
}
