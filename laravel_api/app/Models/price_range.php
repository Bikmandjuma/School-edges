<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\period_price;

class price_range extends Model
{
    use HasFactory;

    protected $fillable=[
        'period_fk_id',
        'min_student',
        'min_student',
        'prices',
    ];

    public function period_priceFN(){
        return $this->belongTo(period_price::class,'period_fk_id');
    }
}
