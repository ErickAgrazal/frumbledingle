<?php

namespace Tests\Feature;

use Tests\TestCase;

class LocationsTest extends TestCase
{
    /**
     * Tests locations page loads
     *
     * @return void
     */
    public function test_locations_page_loads()
    {
        $response = $this->get('/locations');
        $response->assertStatus(200);
    }

    public function test_locations_api_post_success()
    {
        $response = $this->postJson('/api/locations', ['name' => 'New Location']);
        $response->assertStatus(200);
    }
}
