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

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');

Route::post('customers','App\Http\Controllers\CustomersController@paginate');
Route::get('customers','App\Http\Controllers\CustomersController@paginate');
Route::get('customers/averagelastday','App\Http\Controllers\CustomersController@getTodayAverage');
Route::get('customers/averagelastweek','App\Http\Controllers\CustomersController@getLastWeekAverage');
Route::get('customers/averagelastmonth','App\Http\Controllers\CustomersController@getLastMonthAverage');
Route::get('customers/averagelastthreemonths','App\Http\Controllers\CustomersController@getLastThreeMonthsAverage');
Route::get('customers/averagelastyear','App\Http\Controllers\CustomersController@getLastYearAverage');


Route::middleware('auth:api')->get('/users', function (Request $request) {
    return $request->user();
});

Route::group([],function () {
    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::post('signup', 'App\Http\Controllers\AuthController@signup');

    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'App\Http\Controllers\AuthController@logout');
        Route::get('users', 'App\Http\Controllers\AuthController@user');
    });
});

Route::get('recaptchacreate', 'RecaptchaController@create');
Route::post('store', 'RecaptchaController@store');

