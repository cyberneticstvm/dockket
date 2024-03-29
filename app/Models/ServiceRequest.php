<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_name',
        'mobile',
        'clinic_id',
        'service_id',
        'service_date',
        'document',
        'location',
        'latitude',
        'longitude',
        'notes',
        'status',
        'user_id',
    ];
}
