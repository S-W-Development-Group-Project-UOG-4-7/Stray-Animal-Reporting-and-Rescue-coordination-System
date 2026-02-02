<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VetAppointment extends Model
{
    protected $fillable = [
        'veterinarian_id',
        'animal_id',
        'appointment_date',
        'type',
        'notes',
        'status',
    ];

    protected $casts = [
        'appointment_date' => 'datetime',
    ];

    public function veterinarian()
    {
        return $this->belongsTo(Veterinarian::class);
    }

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }
}
