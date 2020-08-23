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
            $table->increments('id');
            $table->integer('id_pegawai')->unique();
            $table->unsignedInteger('id_perusahaan')->nullable();
            $table->foreign('id_perusahaan')->references('id')->on('set_perusahaans')->onDelete('cascade');
            $table->string('name');
            $table->string('email', 200);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('status_akun')->nullable();
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
