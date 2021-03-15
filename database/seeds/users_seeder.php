<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class users_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'Super Admin',
            'email'=>'superadmin@gmail.com',
            'password'=>bcrypt('superadmin'),
            'level'=>'admin',
            'desa_id'=>'1',
            'remember_token'	=> NULL,
            'created_at'      => \Carbon\Carbon::now(),
            'updated_at'      => \Carbon\Carbon::now()
        ]);

        DB::table('users')->insert([
            'name'=>'User',
            'email'=>'user@gmail.com',
            'password'=>bcrypt('user1234'),
            'level'=>'user',
            'desa_id'=>'1',
            'remember_token'	=> NULL,
            'created_at'      => \Carbon\Carbon::now(),
            'updated_at'      => \Carbon\Carbon::now()
        ]);

        DB::table('users')->insert([
            'name'=>'petugas1',
            'email'=>'petugas@gmail.com',
            'password'=>bcrypt('petugas123'),
            'level'=>'petugas',
            'desa_id'=>'1',
            'remember_token'	=> NULL,
            'created_at'      => \Carbon\Carbon::now(),
            'updated_at'      => \Carbon\Carbon::now()
        ]);
    }
}
