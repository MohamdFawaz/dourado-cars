<?php

use App\Http\Controllers\Front\CarMakeController;
use App\Http\Controllers\Front\CarModelController;
use App\Http\Controllers\Front\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/sell-car', [HomeController::class, 'home'])->name('sell-car');

Route::group(['prefix' => 'car-model'],function () {
    Route::get('/car-make/{id}',[CarModelController::class, 'getCarMakeModels']);
    Route::get('/years/{id}',[CarModelController::class, 'getCarModelYears']);
});

Route::group(['prefix' => 'car-make'],function () {
   Route::get('/years/{id}',[CarMakeController::class,'getCarMakeYears']);
});
