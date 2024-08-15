<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShareHolder extends Model
{
    use HasFactory;

    protected $fillable=[
        'firstname',
        'lastname',
        'gender',
        'email',
        'phone',
        'dob',
        'username',
        'password',
        'image',
        'role',
    ];
}
