<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class kks_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kks')->insert([
            'no_kk' => '3507220101040527',
            'user_id' => '2',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
    }
}
