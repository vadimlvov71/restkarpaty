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
       // $response = $this->get('/');
       // $this->assertEquals('302', $response->getStatusCode());
        ////
        $response = $this->withSession(['locale' => 'ua'])
                         ->get('/');
		$this->assertEquals('302', $response->getStatusCode());
		////
		$response = $this->get('/ru/Slavskoe');
        $response->assertStatus(200);
        ///
        /* $this->browse(function (Browser $browser) {
            $browser->visit('/ru/Slavskoe')
                    //->assertSee('Славское')
                    //->clickLink('Previous')
                    //->assertPathIs('/alpha')
                    ;
        });*/
    }
}
