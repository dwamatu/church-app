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
    Route::post('events', 'BaseController@createEvent');
    Route::put('events/{id}', 'BaseController@updateEvent');
    //EventGoers
    Route::post('eventgoers', 'BaseController@createEventGoer');
    Route::put('eventgoers/{id}', 'BaseController@updateEventGoer');

});

Route::get('/php', function () {
    return phpinfo();
});