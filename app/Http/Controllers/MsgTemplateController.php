<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MsgTemplates;
use DB;

class MsgTemplateController extends Controller
{
    public function templateindex()
        {
            return view('sms.msgtemplate');
        }

    public function insert(Request $request){
        $msgtemp = new MsgTemplates;

        
        $msgtemp->title = $request->input('title');
        $msgtemp->contents = $request->input('contents');
        $msgtemp->main_cat = $request->input('maincatSelect');
        $msgtemp->sub_cat = $request->input('subcatSelect');
        $msgtemp->status = $request->input('');
        $msgtemp->save();
        return redirect()->action('MsgTemplateController@templateindex');
    }
}
