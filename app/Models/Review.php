<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'adoption_request_id',
        'animal_id',
        'reviewer_name',
        'rating',
        'comment',
    ];

    public function adoptionRequest()
    {
        return $this->belongsTo(AdoptionRequest::class);
    }

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }
}
