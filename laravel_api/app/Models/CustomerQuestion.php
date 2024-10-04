<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ShareHolder;
use App\Models\Customer;

class CustomerQuestion extends Model
{
    use HasFactory;
    protected $fillable=[
        'school_fk_id',
        'message',
        'time_msg_sent',
        'share_holders_fk_id',
        'reply_msg',
        'time_msg_replied',
    ];

    public function customer_questionFN(){
        return $this->belongTo(Customer::class,'school_fk_id');
    }

    public function share_holdersFN(){
        return $this->belongTo(ShareHolder::class,'share_holders_fk_id');
    }

}
