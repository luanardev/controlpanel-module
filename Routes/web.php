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

Route::prefix('controlpanel')->middleware(['auth', 'admin:controlpanel'])->group(function () {

    Route::get('/', 'HomeController@index')->name('controlpanel.module');

    Route::get('apps', 'AppController@index')->name('apps.index');

    Route::get('apps/{app}', 'AppController@show')->name('apps.show');

    Route::get('users/search', 'UserController@search')->name('users.search');

    Route::get('roles/{role}/apps/{app}/permissions', 'RoleController@addPermissions')->name('role.app.permissions');

    Route::get('roles/{role}/delete', 'RoleController@delete')->name('roles.delete');

    Route::resource('users', 'UserController');

    Route::resource('roles', 'RoleController');


});
