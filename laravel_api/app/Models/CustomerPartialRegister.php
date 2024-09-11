<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerPartialRegister extends Model
{
    use HasFactory;
    protected $fillable=[
        'school_name',
        'email',
        'phone',
        'country',
    ];

    public function CustomerPartialRegisterFn(){
        return $this->hasOne(AllowCustomerToRegiter::class,'customer_partial_reg_fk_id');
    }
}
