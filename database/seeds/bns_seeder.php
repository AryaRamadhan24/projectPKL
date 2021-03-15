<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class bns_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bns')->insert([
            'no_buku' => '3677395',
            'user_id' => '2',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
    }
}
