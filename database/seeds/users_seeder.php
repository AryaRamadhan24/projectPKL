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
            'name'=>'Saifur Rifqi Ali',
            'email'=>'saifurrifqi9@gmail.com',
            'password'=>bcrypt('Ali102033'),
            'level'=>'admin',
        ]);

        DB::table('users')->insert([
            'name'=>'Muhammad Arya Ramadhan',
            'email'=>'182410102035@gmail.com',
            'password'=>bcrypt('Arya2035'),
            'level'=>'user',
        ]);
    }
}
