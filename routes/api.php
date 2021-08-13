<?php

use App\Http\Controllers\API\V1\CarController;
use App\Http\Controllers\API\V1\CarMakeController;
use App\Http\Controllers\API\V1\SettingController;
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
Route::group(['prefix' => 'v1'], function() {

    Route::group(['prefix' => 'car-make'],function () {
        Route::get('/',[CarMakeController::class, 'index']);
    });

    Route::group(['prefix' => 'car'],function () {
        Route::get('/',[CarController::class, 'index']);
        Route::get('/{id}',[CarController::class, 'show'])->where(['id' => '^[0-9]*$']);
        Route::get('/compare',[CarController::class, 'compare']);
        Route::get('/{id}/recommended',[CarController::class, 'recommended']);
        Route::get('/panoramic',[CarController::class, 'carPanoramic']);
    });

    Route::group(['prefix' => 'setting'],function () {
        Route::get('/',[SettingController::class, 'index']);
    });

});
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
