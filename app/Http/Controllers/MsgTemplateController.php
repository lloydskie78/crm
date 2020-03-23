<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MsgTemplates;
use DB;

class MsgTemplateController extends Controller
{
    public function templateindex()
    {
        $msgtemp = MsgTemplates::all();
        return view('sms.msgtemplate', compact('msgtemp'));
    }

    public function insert(Request $request)
    {
        $msgtemp = new MsgTemplates;
        
        $msgtemp->title = $request->input('title');
        $msgtemp->contents = $request->input('contents');
        $msgtemp->main_cat = $request->input('maincatSelect');
        $msgtemp->sub_cat = $request->input('subcatSelect');
        $msgtemp->status = "Inactive";
        $msgtemp->save();
        
        return redirect()->action('MsgTemplateController@templateindex');
    }
}
