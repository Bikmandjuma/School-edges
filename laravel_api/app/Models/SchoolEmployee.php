<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;  

class SchoolEmployee extends Authenticatable
{
    use HasFactory;
    protected $fillable=[
        'school_fk_id',
        'firstname',
        'middle_name',
        'lastname',
        'gender',
        'phone',
        'email',
        'dob',
        'role_fk_id',
        'username',
        'password',
        'image',
        'last_active_at',
    ];
}
