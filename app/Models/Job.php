<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $table = 'job_openings';

    protected $fillable = [
        'title',
        'slug',
        'department',
        'location',
        'street_address',
        'address_region',
        'postal_code',
        'type',
        'experience',
        'description',
        'salary',
        'status',
        'translations',
    ];

    protected $casts = [
        'translations' => 'array',
    ];
}
