<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(kecamatans_seeder::class);
        $this->call(desas_seeder::class);
        $this->call(users_seeder::class);
        $this->call(kks_seeder::class);
        $this->call(ktps_seeder::class);
        $this->call(bns_seeder::class);
    }
}
