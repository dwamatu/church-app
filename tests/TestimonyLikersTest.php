<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TestimonyLikersTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $faker = Faker\Factory::create();
//        $testimonyliker = \App\TestimonyLiker::findOrFail(103);


        $this->get('/api/v1/testimonylikers')->assertResponseStatus(200)->seeJsonStructure(['results']);

        $this->get('/api/v1/testimonylikers/1000000')->assertResponseStatus(200)->seeJsonStructure(['errors']);
        $this->get('/api/v1/testimonylikers/103')->assertResponseStatus(200)->seeJsonStructure(['resource']);

        $this->json('POST', '/api/v1/testimonylikers', [
            "user_email" => $faker->email,
            "like_date" => $faker->name,
            "liked" => $faker->randomDigitNotNull,
        ])->assertResponseStatus(200)->seeJson(['resource'=>['testimony_id']]);
        //TODO ASK KEVIN ABOUT TESTIMONY LIKERS

    }
}
