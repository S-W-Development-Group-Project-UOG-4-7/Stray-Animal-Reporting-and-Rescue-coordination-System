<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    protected $fillable = [
        'pet_id',
        'vet_id',
        'symptoms',
        'diagnosis',
        'prescription',
        'notes',
    ];

    protected $casts = [
        'prescription' => 'array', // ✅ JSON -> Array
    ];
}
