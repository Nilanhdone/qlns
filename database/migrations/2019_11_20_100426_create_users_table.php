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
            $table->string('user_id')->unique();
            $table->string('status')->default('new');
            $table->integer('first_login')->default(0);
            $table->string('role')->nullable();
            $table->string('position')->nullable();
            $table->string('unit')->nullable();
            $table->string('name');
            $table->string('avatar');
            $table->string('gender');
            $table->date('birthday');
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
