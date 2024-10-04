<?php

namespace App\Models;
use App\Models\Customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolEmployee extends Model
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
        'role',
        'sub_role',
        'username',
        'password',
        'image',
    ];

    public function school_employeeFN(){
        return $this->belongTo(Customer::class,'school_fk_id');
    }
}
