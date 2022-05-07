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

Route::prefix('controlpanel')->middleware(['auth', 'module:controlpanel', 'role:admin'])->group(function() {
    
    Route::get('/', 'HomeController@index')->name('controlpanel.home');
    
    Route::get('organisation', 'OrganisationController@index')->name('organisation.index');
    Route::get('modules', 'ModuleController@index')->name('modules.index');
    Route::get('modules/{module}', 'ModuleController@show')->name('modules.show');

    Route::get('users/search', 'UserController@search')->name('users.search');
    Route::resource('users', 'UserController');
    Route::resource('roles', 'RoleController');


});
