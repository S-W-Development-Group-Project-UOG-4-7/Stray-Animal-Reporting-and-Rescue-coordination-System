<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdoptionRequest extends Model
{
    protected $fillable = ['animal_id','full_name','email','phone','reason','status'];
}
