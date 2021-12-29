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
        $this->call(BloodsSeeder::class);
        $this->call(ReligionsSeeder::class);
        $this->call(NationalitiesSeeder::class);
        $this->call(GendersSeeder::class);
        $this->call(SpecializationsSeeder::class);
        $this->call(SettingsSeeder::class);
    }
}
