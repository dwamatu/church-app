<?php

use App\Event;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class apiTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    use DatabaseTransactions;

    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testDataFetch()
    {

        $this->get('/api/v1/events')->assertResponseStatus(200);

        $this->get('/api/v1/tes')->assertResponseStatus(404);

        $this->get('/api/v1/events/1')->assertResponseStatus(200);

        $this->get('/api/v1/events/3')->assertResponseStatus(200);


    }

    public function testUpdate(){
        $event = Event::findOrFail(1);


        $this->json('POST', '/api/v1/events', [
            'ename' => "hasl3llo",
            'evenue' =>"asmfoasm",
            'tfrom' => "asmfoasm",
            'tto' => "asmfoasm",
            'des' => "asmfoasm",
            'time' => "asmfoasm"
        ])->seeStatusCode(200);

//        $this->json('PUT', '/api/v1/events', [
//            'ename' => "hallo",
//            'evenue' =>"asmfoasm",
//            'tfrom' => "asmfoasm",
//            'tto' => "asmfoasm",
//            'des' => "asmfoasm",
//            'time' => "asmfoasm"
//        ])->seeStatusCode(200);
    }


}
