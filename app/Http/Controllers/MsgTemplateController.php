<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MsgTemplates;
use DB;
use SoftDeletes;

class MsgTemplateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        $msgtemp->main_cat = $request->input('main_cat');
        $msgtemp->sub_cat = $request->input('sub_cat');
        $msgtemp->status = "Inactive";
        $msgtemp->save();

        return json_encode($msgtemp);

    }

    public function edit(){
        $db = MsgTemplates::find($id);

        $array = [
                'title' => $request->input('title'),
                'contents' => $request->input('contents'),
                'main_cat' => $request->input('main_cat'),
                'sub_cat' => $request->input('sub_cat'),
            ];

            $db->update($array);

    }

    public function delete($id){
        
        $db = MsgTemplates::find($id);
        $db->delete();
    }
}
