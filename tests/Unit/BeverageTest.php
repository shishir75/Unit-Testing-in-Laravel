<?php

namespace Tests\Unit;

use App\Beverage;
use App\Exceptions\MinorCannotBuyAlcoholicBeverageException;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class BeverageTest extends TestCase
{
    use DatabaseMigrations;

    private $beverage;


    protected function setUp(): void
    {
        parent::setUp();    

        $this->beverage = factory(Beverage::class)->make();
    }

    /**
     * A basic test.
     * @test
     * @return void
     */
    public function beverage_has_name()
    {

        $this->assertNotEmpty($this->beverage->name);
    }

    /**
     * A basic test.
     * @test
     * @return void
     */
    public function beverage_has_type()
    {
        $beverage = factory(Beverage::class)->make();

        $this->assertNotEmpty($this->beverage->type);
    }


    /**
    * A basic test.
    * @test
    * @return void
    */
    public function a_minor_user_can_not_buy_alcoholic_beverage()
    {
        $beverage = factory(Beverage::class)->make([
            'type' => 'Alcoholic'
        ]);

        $user = factory(User::class)->make([
            'age' => '17'
        ]);

        $this->actingAs($user);

        $this->expectException(MinorCannotBuyAlcoholicBeverageException::class);

        $beverage->buy();
    }
}
