<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolRoleMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rol_role_menu', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('role_id')->nullable()->unsigned();
            $table->bigInteger('menu_id')->nullable()->unsigned();
            $table->text('options')->nullable();
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->boolean('deleted')->default(0);
            $table->timestamps();

            $table->foreign('role_id')->references('id')->on('set_jabatans')->onDelete('cascade');
            $table->foreign('menu_id')->references('id')->on('sys_menu')->onDelete('no action');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rol_role_menu');
    }
}
