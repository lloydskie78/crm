<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('client_models')->insert([
            [
            'agency_name' => 'Kay Burton',
            'name'=> "JUSTIN",
            'number'=> "0 400 001",
            'email'=> "example@kayburton.com.au",
            'msg_in'=> "",
            'update'=> "",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
            'agency_name' => "O'Brien",
            'name'=> "Bronwyn",
            'number'=> "0 400 002",
            'email'=> "bronwyn.payne@obre.com.au",
            'msg_in'=> "",
            'update'=> "",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
            'agency_name' => "O'Brien",
            'name'=> "Hastings",
            'number'=> "0 400 003",
            'email'=> "hastings@obre.com.au",
            'msg_in'=> "",
            'update'=> "",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
            'agency_name' => "Ray White",
            'name'=> "Kirsty",
            'number'=> "0 400 004",
            'email'=> "kirsty.edwards@raywhite.com.au",
            'msg_in'=> "",
            'update'=> "",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
            'agency_name' => "Barry Plant",
            'name'=> "Cathy",
            'number'=> "0 400 005",
            'email'=> "cdunlo@barryplant.com.au",
            'msg_in'=> "",
            'update'=> "",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
            'agency_name' => "Hocking Stuart",
            'name'=> "Holly",
            'number'=> "0 400 006",
            'email'=>  "hbowman@hockingstuart.com.au",
            'msg_in'=> "",
            'update'=> "",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);
    }
}
