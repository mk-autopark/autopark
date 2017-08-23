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

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'carpark'], function () {
    Route::get('/', ['as' => 'app.carpark.index', 'uses' => 'ApCarParkController@index']);
    Route::get('/create', ['as' => 'app.carpark.create', 'uses' => 'ApCarParkController@create']);
    Route::post('/create', ['uses' => 'ApCarParkController@store']);
    Route::group(['prefix' => '{id}'], function () {
        Route::get('/', ['as' => 'app.carpark.show', 'uses' => 'ApCarParkController@show']);
        Route::get('/edit', ['as' => 'app.carpark.edit', 'uses' => 'ApCarParkController@edit']);
        Route::post('/edit', ['uses' => 'ApCarParkController@update']);
        Route::delete('/delete', ['as' => 'app.carpark.destroy', 'uses' => 'ApCarParkController@destroy']);
    });
});

Route::group(['prefix' => 'fuel'], function () {
    Route::get('/', ['as' => 'app.fuel.index', 'uses' => 'ApCarHistoryFuelController@index']);
    Route::get('/create', ['as' => 'app.fuel.create', 'uses' => 'ApCarHistoryFuelController@create']);
    Route::post('/create', ['uses' => 'ApCarHistoryFuelController@store']);
    Route::group(['prefix' => '{id}'], function () {
        Route::get('/', ['as' => 'app.fuel.show', 'uses' => 'ApCarHistoryFuelController@show']);
        Route::get('/edit', ['as' => 'app.fuel.edit', 'uses' => 'ApCarHistoryFuelController@edit']);
        Route::post('/edit', ['uses' => 'ApCarHistoryFuelController@update']);
        Route::delete('/delete', ['as' => 'app.fuel.destroy', 'uses' => 'ApCarHistoryFuelController@destroy']);
    });
});

Route::group(['prefix' => 'routes'], function () {
    Route::get('/', ['as' => 'app.routes.index', 'uses' => 'ApCarHistoryRoutesController@index']);
    Route::get('/create', ['as' => 'app.routes.create', 'uses' => 'ApCarHistoryRoutesController@create']);
    Route::post('/create', ['uses' => 'ApCarHistoryRoutesController@store']);
    Route::group(['prefix' => '{id}'], function () {
        Route::get('/', ['as' => 'app.routes.show', 'uses' => 'ApCarHistoryRoutesController@show']);
        Route::get('/edit', ['as' => 'app.routes.edit', 'uses' => 'ApCarHistoryRoutesController@edit']);
        Route::post('/edit', ['uses' => 'ApCarHistoryRoutesController@update']);
        Route::delete('/delete', ['as' => 'app.routes.destroy', 'uses' => 'ApCarHistoryRoutesController@destroy']);
    });
});

Route::group(['prefix' => 'drivers'], function () {
    Route::get('/', ['as' => 'app.drivers.index', 'uses' => 'ApCarParkDriversController@index']);
    Route::get('/create', ['as' => 'app.drivers.create', 'uses' => 'ApCarParkDriversController@create']);
    Route::post('/create', ['uses' => 'ApCarParkDriversController@store']);
    Route::group(['prefix' => '{id}'], function () {
        Route::get('/', ['as' => 'app.drivers.show', 'uses' => 'ApCarParkDriversController@show']);
        Route::get('/edit', ['as' => 'app.drivers.edit', 'uses' => 'ApCarParkDriversController@edit']);
        Route::post('/edit', ['uses' => 'ApCarParkDriversController@update']);
        Route::delete('/delete', ['as' => 'app.drivers.destroy', 'uses' => 'ApCarParkDriversController@destroy']);
    });
});

Route::group(['prefix' => 'users'], function () {
    Route::get('/', ['as' => 'app.users.index', 'uses' => 'ApUsersController@index']);
    Route::get('/create', ['as' => 'app.users.create', 'uses' => 'ApUsersController@create']);
    Route::post('/create', ['uses' => 'ApUsersController@store']);
    Route::group(['prefix' => '{id}'], function () {
        Route::get('/', ['as' => 'app.users.show', 'uses' => 'ApUsersController@show']);
        Route::get('/edit', ['as' => 'app.users.edit', 'uses' => 'ApUsersController@edit']);
        Route::post('/edit', ['uses' => 'ApUsersController@update']);
        Route::delete('/delete', ['as' => 'app.users.destroy', 'uses' => 'ApUsersController@destroy']);
    });
});



