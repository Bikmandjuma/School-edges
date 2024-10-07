<?php

namespace App\Models;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactSocialMedia extends Model
{
    use HasFactory;
    protected $fillable=[
        'school_fk_id',
        'phone',
        'email',
        'address',
        'facebook',
        'whatsapp',
        'instagram',
        'linkedin',
        'twitter',
    ];

    public function contact_social_mediaFN(){
        return $this->belongTo(Customer::class,'school_fk_id');
    }
    
}
