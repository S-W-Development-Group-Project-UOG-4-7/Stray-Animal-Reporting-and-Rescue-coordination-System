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
        'animal_species',        // Dog, Cat, or Other
        'other_species',         // Specific type when "Other" is selected
        'animal_type',           // Aggressive, Sick/Injured, Stray/Lost, Abandoned
        'description',
        'animal_photo',
        
        // Location fields
        'latitude',              // Decimal(10, 8)
        'longitude',             // Decimal(11, 8)
        'urgency',               // low, medium, high, emergency
        'formatted_address',     // Full formatted address from Google Maps
        'place_id',              // Google Place ID
        'location',              // Simple location string
        
        'last_seen',
        'contact_name',
        'contact_phone',
        'contact_email',
        'terms_accepted',        // Boolean for terms acceptance
        'status',
        'expires_at',
    ];

    protected $casts = [
        'last_seen' => 'datetime',
        'expires_at' => 'datetime',
        'terms_accepted' => 'boolean',
        'latitude' => 'float',
        'longitude' => 'float',
    ];

    /**
     * Generate a unique report ID
     */
    public static function generateReportId()
    {
        do {
            $reportId = 'SP-' . strtoupper(Str::random(8)) . date('ymd');
        } while (self::where('report_id', $reportId)->exists());

        return $reportId;
    }

    /**
     * Get the display species (combines animal_species and other_species)
     */
    public function getDisplaySpeciesAttribute()
    {
        if ($this->animal_species === 'Other' && $this->other_species) {
            return "Other ({$this->other_species})";
        }
        return $this->animal_species;
    }

    /**
     * Get urgency level color for display
     */
    public function getUrgencyColorAttribute()
    {
        return match($this->urgency) {
            'emergency' => '#ef4444', // Red
            'high' => '#f97316',      // Orange
            'medium' => '#eab308',    // Yellow
            'low' => '#22c55e',       // Green
            default => '#6b7280',     // Gray
        };
    }

    /**
     * Get urgency level with icon
     */
    public function getUrgencyWithIconAttribute()
    {
        $icons = [
            'emergency' => '🚨',
            'high' => '⚠️',
            'medium' => '🔶',
            'low' => '🔵'
        ];
        
        return ($icons[$this->urgency] ?? '') . ' ' . ucfirst($this->urgency);
    }

    /**
     * Get Google Maps URL
     */
    public function getGoogleMapsUrlAttribute()
    {
        if ($this->latitude && $this->longitude) {
            return "https://www.google.com/maps?q={$this->latitude},{$this->longitude}";
        }
        return null;
    }

    /**
     * Get coordinates string
     */
    public function getCoordinatesAttribute()
    {
        if ($this->latitude && $this->longitude) {
            return "{$this->latitude}, {$this->longitude}";
        }
        return 'Not available';
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
     * Get urgency options
     */
    public static function getUrgencyOptions()
    {
        return [
            'low' => 'Low - Animal appears stable',
            'medium' => 'Medium - Needs attention',
            'high' => 'High - Injured or in danger',
            'emergency' => 'Emergency - Life-threatening situation',
        ];
    }

    /**
     * Get the status options for forms
     */
    public static function getStatusOptions()
    {
        return [
            'pending' => 'Pending',
            'processing' => 'Processing',
            'dispatched' => 'Dispatched',
            'rescued' => 'Rescued',
            'completed' => 'Completed',
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
     * Scope for filtering by urgency
     */
    public function scopeByUrgency($query, $urgency)
    {
        return $query->where('urgency', $urgency);
    }

    /**
     * Scope for urgent reports (emergency and high)
     */
    public function scopeUrgent($query)
    {
        return $query->whereIn('urgency', ['emergency', 'high']);
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
     * Scope for nearby reports (using haversine formula)
     */
    public function scopeNearby($query, $latitude, $longitude, $radius = 5)
    {
        return $query->selectRaw("
            *,
            (6371 * acos(cos(radians(?)) * cos(radians(latitude)) * 
            cos(radians(longitude) - radians(?)) + sin(radians(?)) * 
            sin(radians(latitude)))) AS distance",
            [$latitude, $longitude, $latitude]
        )
        ->having('distance', '<', $radius)
        ->orderBy('distance');
    }

    /**
     * Scope for reports within bounds
     */
    public function scopeWithinBounds($query, $north, $south, $east, $west)
    {
        return $query->whereBetween('latitude', [$south, $north])
                    ->whereBetween('longitude', [$west, $east]);
    }

    /**
     * Check if report has location data
     */
    public function hasLocation()
    {
        return !is_null($this->latitude) && !is_null($this->longitude);
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
     * Check if report needs immediate attention
     */
    public function needsImmediateAttention()
    {
        return $this->urgency === 'emergency' && $this->isActive();
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

    /**
     * Get the formatted created at date
     */
    public function getFormattedCreatedAtAttribute()
    {
        return $this->created_at->format('M d, Y h:i A');
    }

    /**
     * Get distance from given coordinates
     */
    public function getDistanceFrom($latitude, $longitude)
    {
        if (!$this->hasLocation()) {
            return null;
        }

        $earthRadius = 6371; // in kilometers

        $latFrom = deg2rad($latitude);
        $lonFrom = deg2rad($longitude);
        $latTo = deg2rad($this->latitude);
        $lonTo = deg2rad($this->longitude);

        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;

        $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
            cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));

        return $angle * $earthRadius;
    }

    /**
     * Get display location (prefer formatted_address, fallback to location)
     */
    public function getDisplayLocationAttribute()
    {
        if (!empty($this->formatted_address)) {
            return $this->formatted_address;
        }
        return $this->location;
    }
}