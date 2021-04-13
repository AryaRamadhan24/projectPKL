<?php

use Illuminate\Database\Seeder;

class menu_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
            'nama_menu' => 'Kartu Keluarga Miskin',
            'nama_input' => 'Nomor Kartu Keluarga Miskin',
            'nama_inputGambar' => 'Foto Kartu Keluarga Miskin',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);    }
}
