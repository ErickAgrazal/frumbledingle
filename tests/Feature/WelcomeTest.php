<?php

namespace Tests\Feature;

use Tests\TestCase;

class WelcomeTest extends TestCase
{
    /**
     * Tests categories page loads
     *
     * @return void
     */
    public function test_categories_page_loads()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
}
