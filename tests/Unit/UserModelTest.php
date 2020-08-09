<?php

namespace Tests\Unit;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;  // it is very important

class UserModelTest extends TestCase
{
    use DatabaseMigrations;

    /**
    * A basic test.
    * @test
    * @return void
    */
    public function user_has_full_name_attribute()
    {
        $user = User::create(['first_name' => 'Shishir', 'last_name' => 'Sarder', 'email' => 'me@abc.com', 'password' => 'password']);

        $this->assertEquals('Shishir Sarder', $user->fullname);
    }
}
