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

Route::prefix('webadmin')->group(function () {
    Route::group(['middleware' => ['auth']], function () {
        Route::get('/', 'DashboardController@index');
        Route::get('/queue-live', 'QueueManagementController@get_live_count');
        Route::get('/queue-list', 'QueueManagementController@get_queue_list');
    });
});

Route::prefix('user-management')->group(function () {
    Route::group(['middleware' => ['auth']], function () {
        Route::get('/', 'UserManagementController@index');
        Route::get('/get-instance-collections', 'UserManagementController@get_instance_collections');
    });
});

Route::prefix('manajemen-instansi')->group(function () {
    Route::group(['middleware' => ['auth']], function () {
        Route::get('/', 'InstansiController@index');
    });
});


Route::prefix('settings')->group(function () {
    Route::group(['middleware' => ['auth']], function () {
        Route::get('/', 'SettingController@index');
        Route::post('/create', 'SettingController@store');
        Route::post('/edit', 'SettingController@update');
    });
});

Route::prefix('history')->group(function () {
    Route::group(['middleware' => ['auth']], function () {
        Route::get('/', 'HistoryController@index');
        Route::get('/detail/{history_id}', 'HistoryController@show');
        Route::post('/create', 'SettingController@store');
        Route::post('/edit', 'SettingController@update');
    });
});
