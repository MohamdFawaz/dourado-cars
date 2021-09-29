<?php

use App\Http\Controllers\Front\CarMakeController;
use App\Http\Controllers\Front\CarModelController;
use App\Http\Controllers\Front\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/cars', [HomeController::class, 'cars'])->name('list-cars');
Route::get('/panoramic-cars', [HomeController::class, 'getPanoramicCars'])->name('list-panoramic-cars');
Route::get('/panoramic-cars/{id}', [HomeController::class, 'showPanoramicCar'])->name('show-panoramic-car')->where(['id' => '^[0-9]*$']);
Route::get('/cars/{id}', [HomeController::class, 'showCar'])->name('show-car')->where(['id' => '^[0-9]*$']);
Route::get('/sell-a-car', [HomeController::class, 'sellCar'])->name('sell-car');
Route::get('/compare', [HomeController::class, 'home'])->name('compare');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/compare', [HomeController::class, 'compare'])->name('compare');
Route::get('/contact-us', [HomeController::class, 'contactUs'])->name('contact-us');

Route::post('/get-in-touch', [HomeController::class, 'getInTouch'])->name('get-in-touch');

Route::group(['prefix' => 'car-model'],function () {
    Route::get('/car-make/{id}',[CarModelController::class, 'getCarMakeModels']);
    Route::get('/years/{id}',[CarModelController::class, 'getCarModelYears']);
});
Route::get('/conditions', [HomeController::class, 'getCarConditionOptions'])->name('sell-car.conditions');
Route::post('/sell-a-call', [HomeController::class, 'submitSellCar'])->name('sell-car.submit');

Route::group(['prefix' => 'car-make'],function () {
   Route::get('/',[CarMakeController::class,'getCarMakes']);
   Route::get('/years/{id}',[CarMakeController::class,'getCarMakeYears']);
});

Route::group(['prefix' => 'locale'], function() {
   Route::get('/meta', [HomeController::class, 'getLocaleMeta']);
});

Route::get('/{locale}',[HomeController::class,'setCurrentLocale'])->name('switch-locale');

Route::get('/cars/format-cars',[HomeController::class,'formatCarsData']);

Route::post('/chat/login', [\App\Http\Controllers\vendor\Chatify\User\MessagesController::class,'userLogin'])->name('chat.login-user');
