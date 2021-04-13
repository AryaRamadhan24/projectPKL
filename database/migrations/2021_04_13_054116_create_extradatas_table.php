<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExtradatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extradatas', function (Blueprint $table) {
            $table->bigIncrements('id_extra');
            $table->text('input');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id_user')->on('users');
            $table->enum('status',['proses','valid','tidak valid'])->default('proses');
            $table->text('pesan')->default('-');
            $table->text('gambar')->default("-");
            $table->bigInteger('menu_id')->unsigned();
            $table->foreign('menu_id')->references('id')->on('menus');
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
        Schema::dropIfExists('extradatas');
    }
}
