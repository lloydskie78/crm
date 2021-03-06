<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email', 150)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('usertype');
            $table->string('password');
            $table->string('test_email', 150)->unique()->nullable();
            $table->string('test_number')->nullable();
            $table->string('gateway');
            $table->string('gate_num');
            $table->string('status');
            $table->string('post_type');
            $table->string('user_dept');
            $table->string('dept_no');
            $table->string('mac_address');
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
