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

// Main Controller
Route::get('/', 'MainController@index');
Route::get('/{id}', 'GeoController@room')->name('geo.room');
Route::get('/room/new', 'RoomController@showForm')->name('room.showForm');
Route::post('/room/create', 'RoomController@create')->name('room.create');
Route::post('/feeling/create', 'FeelingController@create')->name('feeling.create');

// API Controller
Route::get('/api/roomdata/{id}', 'ApiController@getRoomData')->name('api.getRoomData');
Route::get('/api/find/{lat}/{long}', 'GeoController@findRooms')->name('api.findRooms');
