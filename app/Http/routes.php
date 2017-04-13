<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/admin', [
  'uses' => 'HomeController@adminIndex',
  'as' => 'admin',
  'middeware' => 'roles',
  'roles' => ['Admin']
]);
Route::post('/admin', [
  'uses' => 'HomeController@postAdminAssignRoles',
  'as' => 'admin.assign',
  'middeware' => 'roles',
  'roles' => ['Admin', 'Author']
]);
Route::get('/author', 'HomeController@authorIndex');
Route::get('/visitor', 'HomeController@visitorIndex');
