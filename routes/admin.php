<?php

use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\CarMakeController;
use App\Http\Controllers\Admin\CarModelController;
use App\Http\Controllers\Admin\HomepageBannerController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\VideoLinkController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => "admin"], function (){
    Auth::routes();
    Route::group(['middleware' => 'auth'],function (){
        Route::get('/dashboard', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('dashboard');

        Route::group(['prefix' => 'car-make'],function () {
            Route::get('/',[CarMakeController::class, 'index'])->name('car-make.index');
            Route::get('/create',[CarMakeController::class, 'create'])->name('car-make.create');
            Route::post('/',[CarMakeController::class, 'store'])->name('car-make.store');
            Route::get('/edit/{id}',[CarMakeController::class, 'edit'])->name('car-make.edit');
            Route::put('/update/{id}',[CarMakeController::class, 'update'])->name('car-make.update');
            Route::put('/toggle-activation',[CarMakeController::class, 'toggleActivation'])->name('car-make.toggle-activation');
        });

        Route::group(['prefix' => 'car-model'],function () {
            Route::get('/',[CarModelController::class, 'index'])->name('car-model.index');
            Route::get('/create',[CarModelController::class, 'create'])->name('car-model.create');
            Route::post('/',[CarModelController::class, 'store'])->name('car-model.store');
            Route::get('/edit/{id}',[CarModelController::class, 'edit'])->name('car-model.edit');
            Route::put('/update/{id}',[CarModelController::class, 'update'])->name('car-model.update');
            Route::delete('/delete/{id}',[CarModelController::class, 'destroy'])->name('car-model.delete');
            Route::get('/car-make/{id}',[CarModelController::class, 'getCarMakeModels'])->name('car-model.by-car-make');
        });

        Route::group(['prefix' => 'car'],function () {
            Route::get('/',[CarController::class, 'index'])->name('car.index');
            Route::get('/create',[CarController::class, 'create'])->name('car.create');
            Route::post('/',[CarController::class, 'store'])->name('car.store');
            Route::get('/edit/{id}',[CarController::class, 'edit'])->name('car.edit');
            Route::put('/update/{id}',[CarController::class, 'update'])->name('car.update');
            Route::delete('/delete/{id}',[CarController::class, 'destroy'])->name('car.delete');
            Route::delete('/delete/image/{id}',[CarController::class, 'deleteImage'])->name('car.image.delete');
            Route::put('/toggle-featured',[CarController::class, 'toggleFeatured'])->name('car.toggle-featured');
        });

        Route::group(['prefix' => 'homepage-banner'],function () {
            Route::get('/',[HomepageBannerController::class, 'index'])->name('homepage_banner.index');
            Route::get('/create',[HomepageBannerController::class, 'create'])->name('homepage_banner.create');
            Route::post('/',[HomepageBannerController::class, 'store'])->name('homepage_banner.store');
            Route::get('/edit/{id}',[HomepageBannerController::class, 'edit'])->name('homepage_banner.edit');
            Route::put('/update/{id}',[HomepageBannerController::class, 'update'])->name('homepage_banner.update');
            Route::delete('/delete/{id}',[HomepageBannerController::class, 'destroy'])->name('homepage_banner.delete');
        });


        Route::group(['prefix' => 'video-link'],function () {
            Route::get('/',[VideoLinkController::class, 'index'])->name('video_link.index');
            Route::get('/create',[VideoLinkController::class, 'create'])->name('video_link.create');
            Route::post('/',[VideoLinkController::class, 'store'])->name('video_link.store');
            Route::get('/edit/{id}',[VideoLinkController::class, 'edit'])->name('video_link.edit');
            Route::put('/update/{id}',[VideoLinkController::class, 'update'])->name('video_link.update');
            Route::delete('/delete/{id}',[VideoLinkController::class, 'destroy'])->name('video_link.delete');
        });

        Route::group(['prefix' => 'settings'],function () {
            Route::get('/',[SettingController::class, 'index'])->name('settings.index');
            Route::get('/create',[SettingController::class, 'create'])->name('settings.create');
            Route::post('/',[SettingController::class, 'store'])->name('settings.store');
            Route::get('/edit/{id}',[SettingController::class, 'edit'])->name('settings.edit');
            Route::put('/update/{id}',[SettingController::class, 'update'])->name('settings.update');
            Route::delete('/delete/{id}',[SettingController::class, 'destroy'])->name('settings.delete');
        });

    });
});
