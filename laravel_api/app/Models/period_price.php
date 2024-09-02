<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class period_price extends Model
{
    use HasFactory;

    protected $fillable=[
        'period',
        'student_limit',
    ];
}
