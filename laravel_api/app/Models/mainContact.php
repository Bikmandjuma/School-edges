<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mainContact extends Model
{
    use HasFactory;
    protected $fillable=[
        "name",
        "email",
        "phone",
        "subject",
        "message"
    ];
}
