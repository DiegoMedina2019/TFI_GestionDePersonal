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
        $this->call(PermisosSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(RolTipoSeeder::class);
    }
}