<?php

use Illuminate\Http\Request;
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


Route::post('customers','App\Http\Controllers\CustomersController@paginate');
Route::get('customers/averagelastday','App\Http\Controllers\CustomersController@getTodayAverage');
Route::get('customers/averagelastweek','App\Http\Controllers\CustomersController@getLastWeekAverage');
Route::get('customers/averagelastmonth','App\Http\Controllers\CustomersController@getLastMonthAverage');
Route::get('customers/averagelastthreemonths','App\Http\Controllers\CustomersController@getLastThreeMonthsAverage');
Route::get('customers/averagelastyear','App\Http\Controllers\CustomersController@getLastYearAverage');


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([],function () {
    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::post('signup', 'App\Http\Controllers\AuthController@signup');

    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'App\Http\Controllers\AuthController@logout');
        Route::get('user', 'App\Http\Controllers\AuthController@user');
    });
});

