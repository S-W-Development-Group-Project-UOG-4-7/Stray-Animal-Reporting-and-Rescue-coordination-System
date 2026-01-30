<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'session_id',     // ✅ REQUIRED
        'amount',
        'donor_name',
        'donor_email',
        'phone',
        'address',
        'message',
        'anonymous',
        'show_on_wall',
        'payment_method',
        'payment_slip',
        'status',
    ];
}
