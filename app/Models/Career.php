<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;

    protected $table = 'careers';

    protected $fillable = [
        'slug',
        'department',
        'location',
        'type',
        'experience',
        'salary',
        'status',
        'translations',
    ];

    protected $casts = [
        'translations' => 'array',
    ];
}
