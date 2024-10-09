<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CustomerPartialRegister;

class AllowCustomerToRegiter extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_partial_reg_fk_id',
        'status'
    ];

    public function AllowCustomerToRegiterFn(){
        return $this->belongTo(CustomerPartialRegister::class,'customer_partial_reg_fk_id');
    }
}
