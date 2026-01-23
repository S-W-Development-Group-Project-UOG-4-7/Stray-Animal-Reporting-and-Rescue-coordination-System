<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adoption extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'dob',
        'address',
        'housing_type',
        'animal_id',
        'previous_pet',
        'current_pets',
        'adoption_reason',
        'home_environment',
        'vet_info',
        'terms',
        'newsletter'
    ];
}
