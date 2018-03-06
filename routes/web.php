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

Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/jobs', 'JobsController@index')->name('jobs');
Route::get('/jobs/create', 'JobsController@create')->name('create-job');
Route::post('/jobs/store', 'JobsController@store');
Route::get('/jobs/edit/{id}', 'JobsController@edit');
Route::put('/jobs/update/{id}', 'JobsController@update');
Route::get('/jobs/destroy/{id}', 'JobsController@destroy');


