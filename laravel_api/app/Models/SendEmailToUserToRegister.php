<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SendEmailToUserToRegister extends Model
{
    use HasFactory;

    protected $fillable=[
        'email',
        'role_id',
        'registered',
    ];
}
