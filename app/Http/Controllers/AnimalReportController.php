<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimalReport extends Model
{
    use HasFactory;

    protected $table = 'animal_reports';

    protected $fillable = [
        'report_id',
        'animal_type',
        'description',
        'location',
        'last_seen',
        'animal_photo',
        'contact_name',
        'contact_phone',
        'contact_email',
        'status',
        'is_active',           // Changed from 'notes'
        'expires_at',
        'admin_notes'          // Changed from 'notes'
    ];

    protected $casts = [
        'last_seen' => 'datetime',
        'expires_at' => 'datetime',
        'is_active' => 'boolean'
    ];

    // Generate a unique report ID
    public static function generateReportId()
    {
        $prefix = 'SP-';
        $date = date('Ymd');
        $random = strtoupper(substr(uniqid(), -6));
        
        return $prefix . $date . '-' . $random;
    }

    // Check if report is active
    public function isActive()
    {
        return $this->is_active && 
               ($this->expires_at === null || $this->expires_at > now());
    }

    // Get status badge class
    public function getStatusBadgeClass()
    {
        $statusClasses = [
            'pending' => 'bg-blue-500/20 text-blue-300',
            'under_review' => 'bg-cyan-500/20 text-cyan-300',
            'rescue_dispatched' => 'bg-purple-500/20 text-purple-300',
            'rescue_completed' => 'bg-green-500/20 text-green-300',
            'completed' => 'bg-yellow-500/20 text-yellow-300',
            'closed' => 'bg-gray-500/20 text-gray-300',
        ];

        return $statusClasses[$this->status] ?? 'bg-gray-500/20 text-gray-300';
    }

    // Get status text
    public function getStatusText()
    {
        $statusTexts = [
            'pending' => 'Pending',
            'under_review' => 'Under Review',
            'rescue_dispatched' => 'Rescue Dispatched',
            'rescue_completed' => 'Rescue Completed',
            'completed' => 'Completed',
            'closed' => 'Closed',
        ];

        return $statusTexts[$this->status] ?? 'Unknown';
    }
}