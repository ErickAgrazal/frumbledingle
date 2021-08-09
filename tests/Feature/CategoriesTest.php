<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CategoryTest extends TestCase
{
    /**
     * Tests categories page loads
     *
     * @return void
     */
    public function test_categories_page_loads()
    {
        $response = $this->get('/categories');
        $response->assertStatus(200);
    }

    public function test_categories_api_post_success()
    {
        $response = $this->postJson('/api/categories', ['name' => 'New category', 'parent_id' => 1]);
        $response->assertStatus(200);
    }
}
