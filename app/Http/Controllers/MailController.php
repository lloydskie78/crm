<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailController extends Controller
{
    public function inbox(){
        
        return view('mail.inbox');
    }

    public function compose(){
        return view('mail.compose');
    }

    public function read(){
        return view('mail.read');
    }
}
