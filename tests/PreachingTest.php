<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\UploadedFile;

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

        $file = new UploadedFile(storage_path('testing/image2.jpg'), 'image2.jpg', filesize(storage_path('testing/image2.jpg')), 'image2/jpg', null, true);

        $this->get('/api/v1/preachings')->assertResponseStatus(200)->seeJsonStructure(['results']);
        $this->get('/api/v1/preachings/1')->assertResponseStatus(200)->seeJsonStructure(['resource']);
        $this->get('/api/v1/preachings/1000')->assertResponseStatus(200)->seeJsonStructure(['errors']);

//        $this->json('POST', '/api/v1/preachings', [
//            "title" => $file,
//            "preached_on" => $faker->text(30),
//            "by" => $faker->name,
//            "streams" => $faker->time,
//            "downloads" => $faker->name,
//            "likes" => $faker->name,
//        ])->assertResponseStatus(200)->seeJson(['resource' =>['preaching_id']]);

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
