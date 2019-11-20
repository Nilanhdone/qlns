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
            $table->integer('user_id')->unique();
            $table->integer('status')->default(1);
            $table->integer('first_login')->default(0);
            $table->string('role');
            $table->string('name');
            $table->string('avatar');
            $table->string('gender');
            $table->date('birthday');
            $table->string('identify_number');
            $table->string('nationality');
            $table->string('religion');
            $table->string('hometown');
            $table->string('address');
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('degree');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
