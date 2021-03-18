<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bns', function (Blueprint $table) {
            $table->bigInteger('no_buku')->unsigned();
            $table->primary('no_buku');
            // $table->date('Tanggal_Menikah');
            // $table->string('Nama_Ayah');
            // $table->string('Status');
            // $table->bigInteger('no_NIK')->unsigned();
            // $table->foreign('no_NIK')->references('NIK')->on('ktps');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id_user')->on('users');
            $table->enum('status',['proses','valid','tidak valid'])->default('proses');
            $table->text('pesan')->default('-');
            $table->text('gambar')->default("-");
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
        Schema::dropIfExists('bns');
    }
}
