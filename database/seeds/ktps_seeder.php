<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ktps_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ktps')->insert([
            'NIK' => '3507226004500002',
            'user_id' => '2',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
    }
}
