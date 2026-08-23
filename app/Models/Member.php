<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'role_id',
        'role_name',
        'status',
        'last_login',
    ];

    protected $hidden = [
        'password',
    ];
}
