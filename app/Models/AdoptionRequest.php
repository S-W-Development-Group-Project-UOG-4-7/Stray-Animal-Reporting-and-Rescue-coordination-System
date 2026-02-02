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
        'nic',
        'address',
        'housing_type',
        'has_fenced_yard',
        'has_other_pets',
        'has_children',
        'reason',
        'status',
        'assigned_to',
    ];

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }

    public function assignedUser()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function review()
    {
        return $this->hasOne(Review::class);
    }
}
