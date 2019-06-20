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

Route::get('/','AdminController@index')->middleware('auth');


Route::group(['prefix'=>'/admin','middleware'=>'auth'],function(){
    Route::get('/','AdminController@index');
    Route::resource('usuarios','UserController');
    Route::resource('clientes','CustomerController');
    Route::resource('creditos','CreditController');
    Route::post('creditos/pagar','CreditController@pay');
});
Route::get('perfil','UserController@perfil')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix'=>'/api/v1'],function(){
    Route::resource('/denuncias','DenunciaController');
});

