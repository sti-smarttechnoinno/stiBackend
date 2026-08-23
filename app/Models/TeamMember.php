<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
        'initials',
        'image',
        'linkedin',
        'translations',
    ];

    protected $casts = [
        'translations' => 'array',
    ];
}
