<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use WithoutMiddleware;
class IndexTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
       // $response = $this->get('/ru');
        //$response->assertStatus(200);
       // $response = $this->followingRedirects()
    //->get('/ru')
    //->assertStatus(200);
    $this->call('GET', '/');
 
    $this->assertViewHas('index');
		//$response = $this->call('GET', URL::to('/en'));
		//$this->assertEquals('302', $response->getStatusCode());
		//$this->assertEquals(URL::to('/ua'), $response->getTargetUrl());
		//$response = $this->call('GET', $response->getTargetUrl());

		//$this->assertEquals('200', $response->getStatusCode());
        
    }
}
