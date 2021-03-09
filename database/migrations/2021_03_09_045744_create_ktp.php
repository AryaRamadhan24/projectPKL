<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKtp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ktp', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nik');
            $table->string('nama');
            $table->string('Tempat_Lahir');
            $table->date('Tanggal_Lahir');
            $table->enum('Golongan_Darah',['A','AB', 'B', 'O']);
            $table->enum('Jenis_Kelamin',['Laki-laki','Perempuan']);
            $table->string('Alamat');
            $table->enum('agama',['Islam','Kristen','Katolik','Hindu','Budha','Kong Hu Chu']);
            $table->enum('status',['Kawin','Belum Kawin', 'Cerai Hidup', 'Cerai Mati']);
            $table->string('pekerjaan');
            $table->enum('kewarganegaraan',['WNI','WNA']);
            $table->string('masa_berlaku');
            $table->string('gambar');
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
        Schema::dropIfExists('ktp');
    }
}
