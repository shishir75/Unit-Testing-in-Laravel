<?php

namespace Tests\Feature;

use App\Beverage;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BeverageTest extends TestCase
{
    use DatabaseMigrations;

    /**
    * A basic test.
    * @test
    * @return void
    */
    public function a_user_can_visit_beverage_page_and_see_beverages()
    {
        $beverage = factory(Beverage::class)->create();  // make

        $response = $this->get('/beverage');

        $response->assertSee($beverage->name);

        $response->assertStatus(200);
    }
}
