<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PatientsTest extends TestCase
{

    
    /** @group patients */
    public function test_the_patients_route_can_be_visited()
    {
        $response = $this->get('/patients');

        $response->assertStatus(200);
    }
}
