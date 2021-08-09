<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ItemTest extends TestCase
{
    /**
     * Tests items page loads
     *
     * @return void
     */
    public function test_item_page_loads()
    {
        $response = $this->get('/items');
        $response->assertStatus(200);
    }

    public function test_items_api_post_success()
    {
        $response = $this->postJson('/api/categories', ['name' => 'New item', 'category_id' => 1, 'location_id' => 1, 'price' => 100]);
        $response->assertStatus(200);
    }
}
