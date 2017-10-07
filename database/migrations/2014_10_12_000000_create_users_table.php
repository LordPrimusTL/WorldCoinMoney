<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('fullname');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('referrer_id')->nullable();
            $table->integer('class_id')->nullable();
            $table->integer('r_mark')->nullable();
            $table->string('r_link')->nullable();
            $table->integer('payment_id')->default(1);
            $table->boolean('activated')->default(false);
            $table->boolean('is_active')->default(false);
            $table->integer('role_id')->default(3);
            $table->softDeletes();
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
