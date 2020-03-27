<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    use SoftDeletes;

    protected $guarded = [];

}
