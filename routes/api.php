<?php

use Illuminate\Support\Facades\Route;

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

Route::prefix('admin')->group(
    function () {
        Route::post('', ['uses' => 'AdminController@create']);
        Route::put('', ['uses' => 'AdminController@update']);
        Route::delete('', ['uses' => 'AdminController@delete']);
    }
);
