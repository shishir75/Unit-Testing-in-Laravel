<?php

namespace Tests\Unit;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use DatabaseMigrations;
    /**
    * A basic test.
    * @test
    * @return void
    */
    public function user_has_age_attribute()
    {
        $user = factory(User::class)->make();
        
        $this->assertNotNull($user->age);
    }
}
