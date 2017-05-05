<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PrayerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testPrayerGet()
    {

        $faker = Faker\Factory::create();
        $prayer = \App\Prayer::findOrFail(38);


        $this->get('/api/v1/prayers')->assertResponseStatus(200)->seeJsonStructure(['results']);
        $this->get('/api/v1/prayers/1')->assertResponseStatus(200)->seeJsonStructure(['errors']);
        $this->get('/api/v1/prayers/38')->assertResponseStatus(200)->seeJsonStructure(['resource']);

//        $this->json('POST', '/api/v1/prayers', [
////            "prayer_id" =>  $faker->randomDigitNotNull,
//            "about" => $faker->text(40),
//            "description" => $faker->text(30),
//            "prayer_type" => $faker->name,
//            "time" => $faker->time,
//            "user" => $faker->name,
//            "prayedby" => $faker->name,
//            "status" => $faker->boolean,
//        ])->assertResponseStatus(200)->seeJsonStructure(['resource' =>['prayer_id']]);


        $this->json('PUT', '/api/v1/prayers/1', [
//            "prayer_id" =>  $faker->randomDigitNotNull,
            "about" => $faker->text(40),
            "description" => $faker->text(30),
            "prayer_type" => $faker->name,
            "time" => $faker->time,
            "user" => $faker->name,
            "prayedby" => $faker->name,
            "status" => $faker->boolean,
        ])->assertResponseStatus(200)->seeJsonStructure(["errors"]);

        $this->json('PUT', '/api/v1/prayers/1', [
            "prayer_id" =>  100000,
            "about" => $faker->text(40),
            "description" => $faker->text(30),
            "prayer_type" => $faker->name,
            "time" => $faker->time,
            "user" => $faker->name,
            "prayedby" => $faker->name,
            "status" => $faker->boolean,
        ])->assertResponseStatus(200)->seeJsonStructure(["errors"]);


        $this->json('PUT', '/api/v1/prayers/1', [
            "prayer_id" =>  38,
            "about" => $faker->text(40),
            "description" => $faker->text(30),
            "prayer_type" => $faker->name,
            "time" => $faker->time,
            "user" => $faker->name,
            "prayedby" => $faker->name,
            "status" => $faker->boolean,
        ])->assertResponseStatus(200)->seeJsonStructure(["resource"]);
    }
}
