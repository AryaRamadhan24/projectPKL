<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKtpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ktps', function (Blueprint $table) {
            $table->bigInteger('NIK')->unsigned();
            $table->primary('NIK');
            // $table->string('nama');
            // $table->string('Tempat_Lahir');
            // $table->date('Tanggal_Lahir');
            // $table->enum('Golongan_Darah',['A','AB', 'B', 'O']);
            // $table->enum('Jenis_Kelamin',['Laki-laki','Perempuan']);
            // $table->enum('agama',['Islam','Kristen','Katolik','Hindu','Budha','Kong Hu Chu']);
            // $table->enum('status',['Kawin','Belum Kawin', 'Cerai Hidup', 'Cerai Mati']);
            // $table->string('pekerjaan');
            // $table->enum('kewarganegaraan',['WNI','WNA']);
            // $table->string('masa_berlaku');
            // $table->bigInteger('kk_no')->unsigned();
            // $table->foreign('kk_no')->references('no_kk')->on('kks');
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
        Schema::dropIfExists('ktps');
    }
}
