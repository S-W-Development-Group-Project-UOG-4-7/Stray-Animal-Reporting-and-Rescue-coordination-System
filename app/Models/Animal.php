<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $fillable = [
        'name',
        'species',
        'type',
        'gender',
        'breed',
        'age',
        'condition',
        'rescue_team',
        'status',
        'image',
        'image_url',
        'description',
        'animal_report_id',
    ];

    public function report()
    {
        return $this->belongsTo(AnimalReport::class, 'animal_report_id');
    }

    public function adoptions()
    {
        return $this->hasMany(Adoption::class);
    }

    public function adoptionRequests()
    {
        return $this->hasMany(AdoptionRequest::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function vetAppointments()
    {
        return $this->hasMany(VetAppointment::class);
    }

    public function healthRecords()
    {
        return $this->hasMany(AnimalHealthRecord::class);
    }
}
