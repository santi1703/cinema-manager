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
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/movies', 'MovieController@index')->name('movies.index');
    Route::get('/movies/create', 'MovieController@create')->name('movies.create');
    Route::post('/movies', 'MovieController@store')->name('movies.store');
    Route::get('/movies/{id}', 'MovieController@edit')->name('movies.edit');
    Route::post('/movies/{id}', 'MovieController@update')->name('movies.update');
    Route::get('/movies/destroy/{id}', 'MovieController@destroy')->name('movies.destroy');

    Route::get('/people', 'PersonController@index')->name('people.index');
    Route::get('/people/create', 'PersonController@create')->name('people.create');
    Route::post('/people', 'PersonController@store')->name('people.store');
    Route::get('/people/{id}', 'PersonController@edit')->name('people.edit');
    Route::post('/people/{id}', 'PersonController@update')->name('people.update');
    Route::get('/people/destroy/{id}', 'PersonController@destroy')->name('people.destroy');
});

