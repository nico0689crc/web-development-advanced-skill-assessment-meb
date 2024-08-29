<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;



class User extends Authenticatable
{
    // Other model properties...

    protected $fillable = [
        'first_name', 
        'last_name',
        'age',
        'phone',
        'address',
        'prof_summary',
        'admin',
        'email', 
        'password',
    ];

    // You may also want to define constants for roles if needed
    const ROLE_ADMIN = 'admin';
    const ROLE_USER = 'user';
}
