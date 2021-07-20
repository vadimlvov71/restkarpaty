<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use WithoutMiddleware;

class CatalogTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample1()
    {
		
        $response = $this->get('/ua/Slavskoe');

        $response->assertStatus(200);
    }
}
