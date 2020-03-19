<?php

namespace App\Http\Controllers;

use App\ClientModel;
use Illuminate\Http\Request;

class DashController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

}
`