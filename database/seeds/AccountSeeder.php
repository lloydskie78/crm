<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
            'name' => 'Lloyd Gene Alcantara',
            'email'=> "fire597@yahoo.com",
            'usertype' => "Administrator",
            'password' =>  bcrypt('Taloy123'),
            'test_email' => "",
            'test_number' => "",
            'gateway' => "Domestic North",
            'gate_num' => "0466911598",
            'status' => "Active",
            'post_type' => "Both",
            'user_dept' => "Both",
            'dept_no' => "141",
            'mac_address' => "00-FF-4F-3B-B0-8D",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);
    }
}
