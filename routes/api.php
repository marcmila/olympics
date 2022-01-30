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

Route::prefix('judge')->group(
    function () {
        Route::put('', ['uses' => 'JudgeController@update']);
        Route::post('/add/result', ['uses' => 'JudgeController@addResult']);
    }
);

Route::prefix('competitor')->group(
    function () {
        Route::post('', ['uses' => 'CompetitorController@create']);
    }
);

Route::prefix('journalist')->group(
    function () {
        Route::post('', ['uses' => 'JournalistController@create']);
        Route::put('', ['uses' => 'JournalistController@update']);
    }
);
