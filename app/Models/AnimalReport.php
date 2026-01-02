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
        'animal_type',
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

    public static function generateReportId()
    {
        return 'SP-' . strtoupper(Str::random(8));
    }
}