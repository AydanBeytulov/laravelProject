<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// USER ROLES : room , user , admin  ->middleware('user.roles:room')

//@TODO: Routers

// Index page
Route::get('/', "Controller@index");

// User routes
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/**
 *  Room routes
 */

Route::group(["prefix" => "room"], function(){

    // Foods routes
    Route::get('foods', 'Room\FoodsController@index')->name('foods')->middleware('user.roles:room');
    Route::post('foods/{id}/buy', 'Room\FoodsController@buy')->name('foods.buy')->middleware('user.roles:room');

    // Room options routes
    Route::get('roomOptions', 'Room\RoomOptionsController@index')->name('roomOptions')->middleware('user.roles:room');


    // Events routes
    Route::get('/events','HomeController@index')->name('events');

    // Reservation routes
    Route::get('/reservation','HomeController@index')->name('reservation');

});

/**
 *  Admin routes
 */



/**
 *  User routes
 */


