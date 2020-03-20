<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MsgTemplateController extends Controller
{
     public function templateindex()
        {
            return view('sms.msgtemplate');
        }
}
