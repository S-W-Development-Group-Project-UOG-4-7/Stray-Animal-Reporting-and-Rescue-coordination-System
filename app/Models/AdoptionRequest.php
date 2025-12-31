<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdoptionRequest extends Model
{
    protected $fillable = [
        'animal_id',
        'full_name',
        'email',
        'phone',
        'address',           // New
        'housing_type',      // New
        'has_fenced_yard',   // New
        'has_other_pets',    // New
        'has_children',      // New
        'reason',
        'status'
    ];

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }
}