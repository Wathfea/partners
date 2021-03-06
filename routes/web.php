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

Route::get('/', 'Web\IndexController@index')->name('index');

Route::resource('partners', 'Web\PartnersController');
Route::resource('properties', 'Web\PropertiesController');