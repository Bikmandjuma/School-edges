<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class schoolController extends Controller
{
    public function open($school_name,$school_id,$school_code){
        return "Home page ".$school_name." ".$school_id." ".$school_code;
    }
}
