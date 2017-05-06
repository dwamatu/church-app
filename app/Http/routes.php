<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('dashboard');
});


Route::get('/events', 'EventController@showEvents');
Route::get('/preachings', 'PreachingController@showPreachings');

//API


Route::group(['prefix' => 'api/v1'], function () {


    Route::get('{table}/{id?}', 'BaseController@issueGetRequest');
    //Events
    Route::post('events', 'EventController@createEvent');
    Route::put('events/{id}', 'EventController@updateEvent');
    //EventGoers
    Route::post('eventgoers', 'EventGoerController@createEventGoer');
    Route::put('eventgoers/{id}', 'EventGoerController@updateEventGoer');
    //Prayers
    Route::post('prayers', 'PrayerController@createPrayer');
    Route::put('prayers/{id}', 'PrayerController@updatePrayer');
    //Preachings
    Route::post('preachings', 'PreachingController@createPreaching');
    Route::put('preachings/{id}', 'PreachingController@updatePreaching');
    //Testimonies
    Route::post('testimonies', 'TestimonyController@createTestimony');
    Route::put('testimonies/{id}', 'TestimonyController@updateTestimony');

});

Route::get('/php', function () {
    return phpinfo();
});