<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class price_range extends Model
{
    use HasFactory;

    protected $fillable=[
        'period_fk_id',
        'min_student',
        'min_student',
        'prices',
    ];
}
