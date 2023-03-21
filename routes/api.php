<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WoodController;
use App\Http\Controllers\WoodCircleController;
use App\Http\Controllers\WoodEntryController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::controller(WoodController::class)->group(function () {
    Route::get('/entry', 'index');
    Route::post('/entry', 'store');
    Route::get('/entry/{wood}', 'show');
    Route::put('/entry/{wood}', 'update');
    Route::delete('/entry/{wood}', 'destroy');
});

Route::controller(WoodCircleController::class)->group(function () {
    Route::get('/circleentry', 'index');
    Route::post('/circleentry', 'store');
    Route::get('/circleentry/{woodcircle}', 'show');
    Route::put('/circleentry/{woodcircle}', 'update');
    Route::delete('/circleentry/{woodcircle}', 'destroy');
});

Route::controller(WoodEntryController::class)->group(function () {
    Route::get('/woodentry', 'index');
    Route::post('/woodentry', 'store');
    // Route::get('/circleentry/{woodcircle}', 'show');
    // Route::put('/circleentry/{woodcircle}', 'update');
    // Route::delete('/circleentry/{woodcircle}', 'destroy');
});
