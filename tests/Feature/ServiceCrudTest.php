<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Service;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ServiceCrudTest extends TestCase
{
    use RefreshDatabase;
    
    /** @group services */
    public function test_a_service_can_be_created()
    {
        Service::create(['name' => 'Inpatient']);

        $this->assertTrue(Service::where('name', 'Inpatient')->exists());
    }
}
