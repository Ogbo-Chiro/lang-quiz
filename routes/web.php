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

Route::name('create')->get('/admin/create', 'HomeController@create');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::name('word')->post('/home', 'HomeController@word');

Route::name('game')->get('/game', 'HomeController@game');

Route::name('check')->post('/game', 'HomeController@check');

Route::name('score')->get('/game/score', 'HomeController@check');

