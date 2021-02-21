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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/catalog',[\App\Http\Controllers\API\FilmController::class, 'index']);
Route::put('/catalog',[\App\Http\Controllers\API\FilmController::class, 'filtered_films']);
Route::post('/show',[\App\Http\Controllers\API\FilmController::class, 'show_film']);
Route::get('/home',[\App\Http\Controllers\API\FilmController::class, 'home_films']);

