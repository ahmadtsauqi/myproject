<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home/json', 'HomeController@json');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/prakiraancuaca', 'DataBMKGController@index');
Route::get('/prakiraancuaca/refresh', 'DataBMKGController@getDataBMKG');

Route::get('/ews', function() {
    return view('ews.index');
})->middleware('auth');

Route::get('/peringatandini', 'PeringatandiniController@index');

//peringatan dini

Route::get('peringatandini/banjir', 'PeringatandiniController@banjir');
Route::post('peringatandini/banjir/update', 'PeringatandiniController@update');
