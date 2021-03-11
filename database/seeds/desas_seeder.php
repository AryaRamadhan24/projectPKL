<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class desas_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('desas')->insert([
            'nama_desa'=>'Jambangan',
            'kecamatan_id'=>'1',
            'created_at'      => \Carbon\Carbon::now(),
            'updated_at'      => \Carbon\Carbon::now()
        ]);
    }
}
