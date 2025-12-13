<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'notes'
    ];
}