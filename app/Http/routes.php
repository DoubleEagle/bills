<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', 'FinanceController@index');
    Route::get('home', 'FinanceController@index');
    Route::get('import', 'FinanceController@import');
    Route::get('transactions', 'FinanceController@view');
    Route::post('verwerken', 'FinanceController@process');
    Route::post('opslaan', 'FinanceController@save');
});
