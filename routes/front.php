<?php

use App\Http\Controllers\Front\CarModelController;
use App\Http\Controllers\Front\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home']);

Route::group(['prefix' => 'car-model'],function () {
    Route::get('/car-make/{id}',[CarModelController::class, 'getCarMakeModels']);
});
