<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnimalHealthRecord extends Model
{
    protected $fillable = [
        'animal_id',
        'veterinarian_id',
        'diagnosis',
        'treatment',
        'medications',
        'follow_up_date',
        'notes',
    ];

    protected $casts = [
        'follow_up_date' => 'date',
    ];

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }

    public function veterinarian()
    {
        return $this->belongsTo(Veterinarian::class);
    }
}
