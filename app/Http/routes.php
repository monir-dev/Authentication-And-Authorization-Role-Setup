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
  'middleware' => 'roles',
  'roles' => ['Admin']
]);
Route::post('/admin', [
  'uses' => 'HomeController@postAdminAssignRoles',
  'as' => 'admin.assign',
  'middleware' => 'roles',
  'roles' => ['Admin']
]);
Route::get('/author', [
  'uses' => 'HomeController@authorIndex',
  'as'   => 'author',
  'middleware' => 'roles',
  'roles' => ['Author']
]);
Route::get('/visitor', [
  'uses' => 'HomeController@visitorIndex',
  'as'  => 'visitor',
  'middleware' => 'roles',
  'roles' => ['Visitor']
]);
