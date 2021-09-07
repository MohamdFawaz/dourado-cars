<?php

use App\Http\Controllers\Front\CarMakeController;
use App\Http\Controllers\Front\CarModelController;
use App\Http\Controllers\Front\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/cars', [HomeController::class, 'cars'])->name('list-cars');
Route::get('/cars/{id}', [HomeController::class, 'showCar'])->name('show-car');
Route::get('/sell-car', [HomeController::class, 'home'])->name('sell-car');
Route::get('/compare', [HomeController::class, 'home'])->name('compare');
Route::get('/about', [HomeController::class, 'about'])->name('about');

Route::post('/get-in-touch', [HomeController::class, 'getInTouch'])->name('get-in-touch');

Route::group(['prefix' => 'car-model'],function () {
    Route::get('/car-make/{id}',[CarModelController::class, 'getCarMakeModels']);
    Route::get('/years/{id}',[CarModelController::class, 'getCarModelYears']);
});

Route::group(['prefix' => 'car-make'],function () {
   Route::get('/years/{id}',[CarMakeController::class,'getCarMakeYears']);
});
