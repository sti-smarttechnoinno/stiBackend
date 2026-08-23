<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = [
        'slug',
        'category',
        'author',
        'author_role',
        'author_bio',
        'published_at',
        'reading_time',
        'status',
        'hero_image',
        'translations',
    ];

    protected $casts = [
        'translations' => 'array',
    ];
}
