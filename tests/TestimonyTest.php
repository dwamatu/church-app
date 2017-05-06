<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TestimonyTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testTestimony()
    {
        $faker = Faker\Factory::create();
        $testimony = \App\Testimony::findOrFail(103);


        $this->get('/api/v1/testimonies')->assertResponseStatus(200)->seeJsonStructure(['results']);

        $this->get('/api/v1/testimonies/1000000')->assertResponseStatus(200)->seeJsonStructure(['errors']);
        $this->get('/api/v1/testimonies/103')->assertResponseStatus(200)->seeJsonStructure(['resource']);

//        $this->json('POST', '/api/v1/testimonies', [
//            "testimony_title" => $faker->text(30),
//            "testimony_desc" => $faker->name,
//            "testimony_time" => $faker->time,
//            "tstatus" => $faker->name,
//            "user" => $faker->name,
//            "likes" => $faker->name,
//            "shares" => $faker->name,
//        ])->assertResponseStatus(200)->seeJsonStructure(['resource'=>['testimony_id']]);

        $this->json('PUT', '/api/v1/testimonies', [
//            "testimony_id" => $faker->text(40),
            "testimony_title" => $faker->text(30),
            "testimony_desc" => $faker->name,
            "testimony_time" => $faker->time,
            "tstatus" => $faker->name,
            "user" => $faker->name,
            "likes" => $faker->name,
            "shares" => $faker->name,
        ])->assertResponseStatus(405);

        $this->json('PUT', '/api/v1/testimonies/1', [
//            "testimony_id" => $faker->text(40),
            "testimony_title" => $faker->text(30),
            "testimony_desc" => $faker->name,
            "testimony_time" => $faker->time,
            "tstatus" => $faker->name,
            "user" => $faker->name,
            "likes" => $faker->name,
            "shares" => $faker->name,
        ])->assertResponseStatus(200)->seeJsonStructure(['errors']);

        $this->json('PUT', '/api/v1/testimonies/1', [
            "testimony_id" => 103,
            "testimony_title" => $faker->text(30),
            "testimony_desc" => $faker->name,
            "testimony_time" => $faker->time,
            "tstatus" => $faker->name,
            "user" => $faker->name,
            "likes" => $faker->randomDigitNotNull,
            "shares" => $faker->randomDigitNotNull,
        ])->assertResponseStatus(200)->seeJsonStructure(['resource']);



    }
}
