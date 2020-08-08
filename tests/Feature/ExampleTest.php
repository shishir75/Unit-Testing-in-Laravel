<?php

namespace Tests\Feature;

use Illuminate\Auth\Events\Validated;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    /**
    * A basic test.
    * @test
    * @return void
    */
    public function about_test_return_something()
    {
        $response = $this->get('/about');

        //dd($response);

        $response->assertSee('About');
    }
}
