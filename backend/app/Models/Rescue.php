<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rescue extends Model
{
    use HasFactory;

    protected $fillable = [
        'animal_type',
        'condition',
        'location',
        'status',
        'notes',
    ];
}
