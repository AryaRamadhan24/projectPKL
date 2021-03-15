<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kks', function (Blueprint $table) {
            $table->bigInteger('no_kk')->unsigned();
            $table->primary('no_kk');
            // $table->string('nama_kepala');
            // $table->string('Alamat');
            // $table->string('RW');
            // $table->string('RT');
            // $table->string('Desa');
            // $table->string('Kecamatan');
            // $table->string('Kabupaten');
            // $table->string('Kode_pos');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id_user')->on('users');
            $table->enum('status',['proses','valid','tidak valid'])->default('proses');
            $table->text('pesan')->default('-');
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
        Schema::dropIfExists('kks');
    }
}
