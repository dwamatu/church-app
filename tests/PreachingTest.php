<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PreachingTest extends TestCase
{


    /**
     * A basic test example.
     *
     * @return void
     */
    public function testPrayer()
    {
        $faker = Faker\Factory::create();
        $preaching = \App\Preaching::findOrFail(1);


        $this->get('/api/v1/preachings')->assertResponseStatus(200)->seeJsonStructure(['results']);
        $this->get('/api/v1/preachings/1')->assertResponseStatus(200)->seeJsonStructure(['resource']);
        $this->get('/api/v1/preachings/1000')->assertResponseStatus(200)->seeJsonStructure(['errors']);

//        $this->json('POST', '/api/v1/preachings', [
//            "title" => $faker->text(40),
//            "preached_on" => $faker->text(30),
//            "by" => $faker->name,
//            "streams" => $faker->time,
//            "downloads" => $faker->name,
//            "likes" => $faker->name,
//        ])->assertResponseStatus(200)->seeJsonStructure(['resource' =>['preaching_id']]);

        $this->json('PUT', '/api/v1/preachings/1000', [
            "preaching_id" =>  1000,
            "title" => $faker->text(40),
            "preached_on" => $faker->text(30),
            "by" => $faker->name,
            "streams" => $faker->time,
            "downloads" => $faker->name,
            "likes" => $faker->name,
        ])->assertResponseStatus(200)->seeJsonStructure(['errors']);

        $this->json('PUT', '/api/v1/preachings/1', [
            "preaching_id" =>  1,
            "title" => $faker->text(40),
            "preached_on" => $faker->text(30),
            "by" => $faker->name,
            "streams" => $faker->time,
            "downloads" => $faker->name,
            "likes" => $faker->name,
        ])->assertResponseStatus(200)->seeJsonStructure(['resource' =>['preaching_id']]);

    }
}
