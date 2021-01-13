<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\GenderSeeder;
use Database\Seeders\ServiceSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([GenderSeeder::class, ServiceSeeder::class]);
    }
}
