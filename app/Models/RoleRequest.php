<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleRequest extends Model
{
    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'address',
        'nic',
        'username',  // NEW
        'password',  // NEW
        'role_type',
        'vet_id',
        'status'
    ];
}