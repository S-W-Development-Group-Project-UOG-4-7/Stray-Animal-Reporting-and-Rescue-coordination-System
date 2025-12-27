<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Adoption extends Model
{
    protected $fillable = [
        'animal_id',
        'applicant_name',
        'applicant_email',
        'applicant_phone',
        'applicant_address',
        'applicant_type',
        'applicant_details',
        'status',
        'assigned_to',
        'notes',
    ];

    /**
     * Get the animal associated with this adoption
     */
    public function animal(): BelongsTo
    {
        return $this->belongsTo(Animal::class);
    }

    /**
     * Get the user (rescue team member) assigned to this adoption
     */
    public function assignedUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    /**
     * Get the application ID in format #ADP-XXXX
     */
    public function getApplicationIdAttribute(): string
    {
        return '#ADP-' . str_pad($this->id, 4, '0', STR_PAD_LEFT);
    }
}
