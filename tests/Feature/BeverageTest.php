<?php

namespace Tests\Feature;

use App\Beverage;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BeverageTest extends TestCase
{
    use DatabaseMigrations;

    private $beverage;

    protected function setUp() : void
    {
        parent::setUp();

        $this->beverage = factory(Beverage::class)->create();
    }

    /**
    * A basic test.
    * @test
    * @return void
    */
    public function a_user_can_visit_beverage_page_and_see_beverages()
    {
        $response = $this->get('/beverage');

        $response->assertSee($this->beverage->name);

        $response->assertStatus(200);

    }


    /**
    * A basic test.
    * @test
    * @return void
    */
    public function a_user_can_visit_a_single_beverage_page()
    {
        $response = $this->get('/beverage/' . $this->beverage->id);

        $response->assertSee($this->beverage->name);

        $response->assertStatus(200);
    }

    /**
    * A basic test.
    * @test
    * @return void
    */
    public function a_logged_in_user_can_buy_beverage()
    {
        $this->authenticate();

        $data = [
            'beverage_id' => $this->beverage->id,
            'price' => 200
        ];

        $response = $this->post('/beverage/buy', $data);
        
        $this->assertDatabaseHas('purchases',$data);

        $response->assertStatus(201);
    }
}
