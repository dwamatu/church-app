<?php

use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $user = new User(array('email' => 'churchapp@gmail.com', 'password' => 'secret'));
        $this->be($user);
        $this->visit('/')
             ->see('Dashboard');
    }
}
