<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = ['Outpatient', 'Inpatient'];

        foreach ($services as $service) {
            Service::create([
                'name' => $service
            ]);
        }
    }
}
