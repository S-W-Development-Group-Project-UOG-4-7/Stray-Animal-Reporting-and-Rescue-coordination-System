<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class AnimalReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'report_id',
        'animal_species',    // New field: Dog, Cat, or Other
        'other_species',     // New field: Specific type when "Other" is selected
        'animal_type',       // Existing field: Aggressive, Sick/Injured, Stray/Lost, Abandoned
        'description',
        'location',
        'last_seen',
        'animal_photo',
        'contact_name',
        'contact_phone',
        'contact_email',
        'status',
        'expires_at',
    ];

    protected $casts = [
        'last_seen' => 'datetime',
        'expires_at' => 'datetime',
    ];

    /**
     * Generate a unique report ID
     */
    public static function generateReportId()
    {
        return 'SP-' . strtoupper(Str::random(8));
    }

    /**
     * Get the display species (combines animal_species and other_species)
     * Example: "Dog" or "Other (Rabbit)"
     */
    public function getDisplaySpeciesAttribute()
    {
        if ($this->animal_species === 'Other' && $this->other_species) {
            return "Other ({$this->other_species})";
        }
        return $this->animal_species;
    }

    /**
     * Get the species options for forms
     */
    public static function getSpeciesOptions()
    {
        return [
            'Dog' => 'Dog',
            'Cat' => 'Cat',
            'Other' => 'Other',
        ];
    }

    /**
     * Get the condition options for forms
     */
    public static function getConditionOptions()
    {
        return [
            'Aggressive' => 'Aggressive/Dangerous',
            'Sick/Injured' => 'Sick/Injured',
            'Stray/Lost' => 'Stray/Lost',
            'Abandoned' => 'Abandoned',
        ];
    }

    /**
     * Get the status options for forms
     */
    public static function getStatusOptions()
    {
        return [
            'pending' => 'Pending',
            'in_progress' => 'In Progress',
            'resolved' => 'Resolved',
            'closed' => 'Closed',
        ];
    }

    /**
     * Scope for filtering by species
     */
    public function scopeBySpecies($query, $species)
    {
        return $query->where('animal_species', $species);
    }

    /**
     * Scope for filtering by condition
     */
    public function scopeByCondition($query, $condition)
    {
        return $query->where('animal_type', $condition);
    }

    /**
     * Scope for filtering by status
     */
    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Scope for active reports (not expired)
     */
    public function scopeActive($query)
    {
        return $query->where('expires_at', '>', now());
    }

    /**
     * Scope for expired reports
     */
    public function scopeExpired($query)
    {
        return $query->where('expires_at', '<=', now());
    }

    /**
     * Check if report is expired
     */
    public function isExpired()
    {
        return $this->expires_at <= now();
    }

    /**
     * Check if report is active (not expired)
     */
    public function isActive()
    {
        return $this->expires_at > now();
    }

    /**
     * Get the formatted last seen date
     */
    public function getFormattedLastSeenAttribute()
    {
        return $this->last_seen->format('M d, Y h:i A');
    }

    /**
     * Get the formatted expires date
     */
    public function getFormattedExpiresAtAttribute()
    {
        return $this->expires_at->format('M d, Y h:i A');
    }
}