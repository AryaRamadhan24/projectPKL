<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class kecamatans_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kecamatans')->insert([
            'nama_kecamatan' => 'Dampit',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('kecamatans')->insert([
            'nama_kecamatan' => 'Turen',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
    }
}
