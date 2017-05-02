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

Route::get('/', 'Auth\LoginController@viewlogin');

Route::group(['middleware' => ['web','admin']], function () {
  Route::get('/dashboard', 'DashboardController@index');
  Route::get('logout','UserController@logout');
  Route::resource('profiles','UserController');
  Route::post('editprofile','UserController@editcurrentuser');
  Route::get('RoomSettings','RoomssettingController@index');
  Route::resource('types','TypesController',['only'=>[
    'store','update','destroy'
    ]]);
  Route::resource('status','StatusController',['only'=>[
    'store','update','destroy'
    ]]);
});

Auth::routes();
