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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('/add_city', [\App\Http\Controllers\UserCitiesController::class, 'saveCity']);
Route::get('/city_list', [\App\Http\Controllers\UserCitiesController::class, 'getCities']);
Route::get('/remove_city/{city_id}', [\App\Http\Controllers\UserCitiesController::class, 'removeCity']);
Route::get('/weather/{city_id}', [\App\Http\Controllers\WeatherController::class, 'weather']);
Route::get('/forecast/{city_id}', [\App\Http\Controllers\WeatherController::class, 'forecast']);
