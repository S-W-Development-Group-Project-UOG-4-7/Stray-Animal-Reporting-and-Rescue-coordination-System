<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Veterinarian extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'clinic',
        'phone',
        'email',
        'specialization',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function appointments()
    {
        return $this->hasMany(VetAppointment::class);
    }

    public function healthRecords()
    {
        return $this->hasMany(AnimalHealthRecord::class);
    }
}
