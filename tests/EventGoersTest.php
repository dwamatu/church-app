<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EventGoersTest extends TestCase
{

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testEventGoers()
    {
        $faker = Faker\Factory::create();

        $this->get('/api/v1/eventgoers')->assertResponseStatus(200)->seeJsonStructure(['results']);

        $this->get('/api/v1/eventgoers/1')->assertResponseStatus(200)->seeJsonStructure(['errors']);

        $this->get('/api/v1/eventgoers/4')->assertResponseStatus(200)->seeJsonStructure(['errors']);

        $this->get('/api/v1/eventgoers/89')->assertResponseStatus(200)->seeJsonStructure(['resource']);;

        //Create a new event goer


        $this->json('POST', '/api/v1/eventgoers', [
//            "event_id" =>  $faker->randomDigitNotNull,
            "user_email" => $faker->email,
            "liked_date" => $faker->date(),
            "attending" => $faker->boolean,
        ])->seeJsonContains(["errors" => "event_id is required"]);

//
//        $this->json('POST', '/api/v1/eventgoers', [
//            "event_id" => $faker->randomDigitNotNull,
//            "user_email" => $faker->email,
//            "liked_date" => $faker->date(),
//            "attending" => $faker->boolean,
//        ])->assertResponseStatus(200)->seeJsonStructure(['resource']);


        $eventgoer = \App\EventGoer::findOrFail(89);

        $this->json('PUT', '/api/v1/eventgoers/89', [
            "event_id" => $faker->randomDigitNotNull,
            "user_email" => $faker->email,
            "liked_date" => $faker->date(),
            "attending" => $faker->boolean,
        ])->assertResponseStatus(200)->seeJsonStructure(['errors']);

        $this->json('PUT', '/api/v1/eventgoers/89', [
            "r_id" => 89,
            "event_id" => $faker->randomDigitNotNull,
            "user_email" => $faker->email,
            "liked_date" => $faker->date(),
            "attending" => $faker->boolean,
        ])->assertResponseStatus(200)->seeJsonStructure(['resource']);

    }

    //TODO add functionality/validation that the event_id exists.


}
