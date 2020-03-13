<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class ClientModel extends Model
{
    public static function insertData($data)
    {
        // Check if duplicate email
        $value = DB::table('client_models')->where('email', $data['email'])->get();
        if ($value->count() == 0) {
            DB::table('client_models')->insert($data);
        }
    }
}
