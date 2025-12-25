<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Treatment extends Model
{
    use HasFactory;

    protected $fillable = [
        'pet_id',
        'veterinarian_id', // must match the column name in the DB
        'title',
        'notes',
        'status',
        'started_at',
        'completed_at',
    ];

    protected $casts = [
        'started_at' => 'datetime',
        'completed_at' => 'datetime',
    ];

    // Relationship to the Pet
    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }

    // Relationship to Treatment Updates
    public function updates()
    {
        return $this->hasMany(TreatmentUpdate::class);
    }

    // Relationship to Veterinarian (User model)
    public function vet()
    {
        return $this->belongsTo(User::class, 'veterinarian_id');
    }
}
