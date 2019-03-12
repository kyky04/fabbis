<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

    Route::group(['namespace' => 'API'], function(){
        Route::resource('master/kriteria', 'KriteriaController');
        Route::resource('master/detail-kriteria', 'DetailKriteriaController');
        Route::post('login', 'UserController@login');
        Route::resource('user', 'UserController');
        Route::resource('pemain', 'PemainController');
        Route::post('pemain-seleksi', 'PemainController@seleksi');
        // Route::post('nilai', 'PemainController@nilai');
        Route::resource('nilai', 'NilaiController');
    });
