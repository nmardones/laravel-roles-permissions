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

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/home','UserController');

/* Users */
Route::resource('users', 'UserController');
Route::get('destroy/{id}', 'UserController@destroy');
Route::post('users/{id}/update', 'UserController@update');


/* Pdermissions */
Route::resource('permissions', 'PermissionsController');
Route::get('permissions/destroy/{id}', 'PermissionsController@destroy');
Route::post('permissions/{id}/update', 'PermissionsController@update');
Route::post('permissions/store', 'PermissionsController@store');

/* Roles */
Route::resource('roles', 'RoleController');
Route::get('roles/destroy/{id}', 'RoleController@destroy');
Route::post('roles/{id}/update', 'RoleController@update');
Route::post('roles/store', 'RoleController@store');

