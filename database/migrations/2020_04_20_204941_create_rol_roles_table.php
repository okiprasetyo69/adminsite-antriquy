<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rol_roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('company_id')->nullable()->unsigned();
            $table->text('name')->nullable();
            $table->text('description')->nullable();
            $table->integer('max_outlet')->default(1)->nullable();
            $table->smallInteger('status')->nullable();
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->boolean('deleted')->default(0);
            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('set_perusahaans')->onDelete('cascade');
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
        Schema::dropIfExists('rol_roles');
    }
}
