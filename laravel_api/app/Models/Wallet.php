<?php

namespace App\Models;
user App\Models\Customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    protected $fillable=[
        'school_fk_id',
        'payment_method',
        'student_range',
        'payment_plan',
        'amount',
        'unit',
        'year',
    ];

    public function walletFN(){
        return $this->belongTo(Customer::class,'school_fk_id');
    }
}
