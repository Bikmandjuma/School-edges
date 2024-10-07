<?php

namespace App\Models;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewContent extends Model
{
    use HasFactory;
    protected $fillable=[
        'school_fk_id',
        'Title',
        'Content',
        'Images',
    ];

    public function new_contentFN(){
        return $this->belongTo(Customer::class,'school_fk_id');
    }
}
