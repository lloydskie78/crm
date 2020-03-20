<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SmsController extends Controller
{
    public function smsindex()
    {
        return view('sms.sms');
    }

}
