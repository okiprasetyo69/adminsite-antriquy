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

// Route::get('/', function () {
//     return view('personalia/personalia');
// });
// Route::get('/personalia/create', function () {
//     return view('personalia/create');
// });
Route::get('/instansi', 'InstansiController@index');
Route::prefix('webadmin')->group(function () {
    Route::get('/instansi', 'InstansiController@index');
});

Auth::routes(['verify' => true]);
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('login', 'Auth\LoginController@logout')->name('login');
Route::get('/verify', 'HomeController@verify')->name('verify');
Route::get('/activate', 'HomeController@activate')->name('activate');

/**
 * END OF AUTH ROUTES
 */

Route::get('/', 'HomeController@index');
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@home')->name('home');
});
