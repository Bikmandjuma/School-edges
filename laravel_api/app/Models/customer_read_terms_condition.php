<?php

namespace App\Models;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer_read_terms_condition extends Model
{
    use HasFactory;
    protected $fillable=[
        'school_fk_id',
        'terms',
        'status',
    ];

    public function customer_read_terms_conditionFN(){
        return $this->belongTo(Customer::class,'school_fk_id');
    }
}
