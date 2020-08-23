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

Route::prefix('api')->group(function () {
    Route::get('/', 'IndexApiController@index');

    Route::prefix('auth')->group(function () {
        Route::post('login', 'AuthMobileApiController@login');
        Route::post('register', 'AuthMobileApiController@register');
    });

    Route::prefix('instance')->group(function () {
        Route::post('find', 'InstanceApiController@find');
        Route::post('nearby', 'InstanceApiController@nearby');
        Route::post('create', 'InstanceApiController@create');
        Route::post('detail/{id}', 'InstanceApiController@detail');
        Route::post('delete', 'InstanceApiController@delete');
        Route::post('datatable', 'InstanceApiController@datatable');
    });

    Route::prefix('user')->group(function () {
        Route::post('find', 'UserApiController@find');
        Route::get('detail', 'UserApiController@detail');
        Route::post('add', 'UserApiController@add');
        Route::delete('delete', 'UserApiController@delete');
        Route::put('edit', 'UserApiController@edit');
        Route::post('verify', 'UserApiController@verify');
    });

    Route::prefix('booking')->group(function () {
        Route::post('book', 'BookingApiController@book');
        Route::post('book_offline', 'BookingApiController@book_offline');
        Route::post('find_active', 'BookingApiController@find_active');
        Route::post('find_history', 'BookingApiController@find_history');
    });

    Route::prefix('queue')->group(function () {
        Route::post('live', 'QueueApiController@live');
        Route::post('live_count', 'QueueApiController@live_count');
        Route::get('get_queue_total', 'QueueApiController@getQueueTotal');
        Route::post('get_queue_total', 'QueueApiController@getQueueTotal');
        Route::post('find', 'QueueApiController@find');
        Route::get('detail', 'QueueApiController@detail');
        Route::post('process', 'QueueApiController@process');
        Route::post('finish', 'QueueApiController@finish');
        Route::post('cancel', 'QueueApiController@cancel');
    });
});
