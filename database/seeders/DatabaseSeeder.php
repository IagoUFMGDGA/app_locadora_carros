<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        //$this->call(CampuSeeder::class);
        //$this->call(TariffFlagSeeder::class);
        //$this->call(TariffModeSeeder::class);
        $this->call(BuildingSeeder::class);
    }
}
