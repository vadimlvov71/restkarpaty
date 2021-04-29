<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {

        $response = $this->withSession(['locale' => 'ua'])->get('/');
		$this->assertEquals('302', $response->getStatusCode());
		////
		$response = $this->get('/ru/Slavskoe');
        $response->assertStatus(200);
       
    }
}
