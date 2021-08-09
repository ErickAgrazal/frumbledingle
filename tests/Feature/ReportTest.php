<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ReportTest extends TestCase
{
    /**
     * Tests report page loads
     *
     * @return void
     */
    public function test_report_page_loads()
    {
        $response = $this->get('/report');
        $response->assertStatus(200);
    }
}
