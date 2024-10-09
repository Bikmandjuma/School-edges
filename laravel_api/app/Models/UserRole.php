<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;

class UserRole extends Model
{
    use HasFactory;
    protected $fillable=[
        "role_name",
        "school_fk_id",
    ];

    public function user_role_fn(){
        return $this->belongTo(Customer::class,'school_fk_id');
    }
}
