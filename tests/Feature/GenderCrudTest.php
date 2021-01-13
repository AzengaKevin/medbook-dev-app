<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Gender;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GenderCrudTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_gender_can_be_create()
    {
        Gender::create(['name' => 'Female']);

        $this->assertTrue(Gender::where('name', 'Female')->exists());
    }
}
