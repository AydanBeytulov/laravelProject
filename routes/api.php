<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("roomOptions/{id}/{value}","API\APIController@updateOption");

Route::post("changeCurrentLanguage/{value}","API\APIController@changeCurrentLanguage");

Route::apiResource('/Foods', 'API\FoodsAPI');

Route::post("makeFoodsOrder","API\APIController@makeFoodsOrder");