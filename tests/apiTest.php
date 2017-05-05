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
    use DatabaseMigrations;
    use WithoutMiddleware; // use the trait

    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testDataFetch()
    {

        $this->get('/api/v1/events')->assertResponseStatus(200)->seeJsonStructure(['results']);

        $this->get('/api/v1/tes')->assertResponseStatus(200)->seeJsonStructure(['errors']);

        $this->get('/api/v1/events/1')->assertResponseStatus(200)->seeJsonStructure(['resource']);

        $this->get('/api/v1/events/3')->assertResponseStatus(200)->seeJsonStructure(['errors'=>[
            'status_code']]);


    }
//
//    public function testEventUpdationUpdate()
//    {
//        $event = Event::findOrFail(1);
//        $faker = Faker\Factory::create();
//
//        $this->json('PUT', '/api/v1/events', [
//            'ename' => $event->ename,
//            'evenue' => $event->evenue,
//            'tfrom' => $event->tfrom,
//            'tto' => $event->tto,
//            'des' => $event->des,
//            'time' => $event->time
//        ])->seeStatusCode(405);
//
//        $this->json('PUT', '/api/v1/events/1', [
//            'ename' => $event->ename,
//            'evenue' => $event->evenue,
//            'tfrom' => $faker->name,
//            'tto' => $event->tto,
//            'des' => $event->des,
//            'time' => $faker->address
//        ])->seeStatusCode(200);
//
//    }
//
//    public function testEventCreation(){
//
//        $faker = Faker\Factory::create();
//
//        $this->json('POST', '/api/v1/events', [
//            "ename" => $faker->name,
//            "evenue" =>  $faker->city,
//            "tfrom" => $faker->date(),
//            "tto" => $faker->date(),
//            "des" => $faker->randomDigitNotNull,
//            "time" => $faker->time()
//        ])->seeStatusCode(200)->seeJsonStructure(['resource' => ["des"]]);
//    }


}
