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

    // Relationship with UserRole
    public function role()
    {
        return $this->belongsTo(UserRole::class, 'role_fk_id');
    }

    // Relationship with School (assuming the 'customers' table represents schools)
    public function school()
    {
        return $this->belongsTo(Customer::class, 'school_fk_id');
    }
}
