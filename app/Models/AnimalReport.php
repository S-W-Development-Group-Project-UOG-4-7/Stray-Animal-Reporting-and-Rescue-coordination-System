<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AnimalReport extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'animal_type',
        'animal_photo',
        'description',
        'location',
        'last_seen',
        'contact_name',
        'contact_phone',
        'contact_email',
        'report_id',
        'status'
    ];

    protected $casts = [
        'last_seen' => 'datetime',
    ];

    // Generate unique report ID
    public static function generateReportId()
    {
        do {
            $reportId = 'SP-' . strtoupper(substr(md5(uniqid()), 0, 8));
        } while (self::withTrashed()->where('report_id', $reportId)->exists());

        return $reportId;
    }
}