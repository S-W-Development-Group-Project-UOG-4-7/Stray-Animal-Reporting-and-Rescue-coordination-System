<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// app/Models/Veterinarian.php

class Veterinarian extends Model
{
    protected $fillable = [
        'name',
        'clinic',
        'phone',
        'status'
    ];
}
