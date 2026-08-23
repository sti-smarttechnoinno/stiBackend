<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;

    protected $table = 'submissions';

    protected $fillable = [
        'candidate_name',
        'email',
        'phone',
        'position',
        'city',
        'nationality',
        'experience',
        'education',
        'linkedin',
        'portfolio',
        'salary',
        'availability',
        'message',
        'cv_file',
        'cover_file',
        'cert_file',
        'status',
    ];
}
