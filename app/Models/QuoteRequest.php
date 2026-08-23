<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteRequest extends Model
{
    use HasFactory;

    protected $table = 'quote_requests';

    protected $fillable = [
        'business_name',
        'contact_person',
        'phone',
        'email',
        'business_type',
        'products',
        'volume',
        'contact_method',
        'message',
        'status',
    ];

    protected $casts = [
        'products' => 'array',
    ];
}
