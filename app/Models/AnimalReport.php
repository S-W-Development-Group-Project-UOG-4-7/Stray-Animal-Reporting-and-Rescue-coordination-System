<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimalReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'animal_type',
        'location',
        'description',
        'dogs_count',
        'assigned_to'
    ];

    // Relationships
    public function assignedUser()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
}
